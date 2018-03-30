<?php

namespace App;

use App\Scopes\PublishedScope;
use Encore\Admin\Auth\Database\Administrator;
use Illuminate\Database\Eloquent\Model;
use Image;

class Article extends Model
{
    public $incrementing = false;

    protected $fillables = [
        'author_id', 'title', 'slug', 'prev_text', 'prev_img', 'prev_img_thumb',
        'body', 'is_published', 'published_at'
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', 1);
    }

    public function author()
    {
        return $this->belongsTo(Administrator::class);
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'article_tags');
    }

    public function bodyHtml()
    {
    	$parsedown = new \Parsedown();

    	return $parsedown->text($this->body);
    }

    public function save(array $options = [])
    {
        if(!$this->id) {
            $id = strtolower(str_random(6));
            while(parent::find($id) !== null){
                $id = str_random(6);
            }

            $this->id = $id;
        }

        if (!$this->author_id) $this->author_id = \Admin::user()->id;

        if (!$this->slug) $this->slug = str_slug($this->title);

        if (!$this->prev_img_thumb) {
            $imageName = str_replace('images/', 'images/thumbs/', $this->prev_img);
            Image::make(storage_path() . '/app/public/' . $this->prev_img)->fit(300, 170)
                ->save(storage_path() . '/app/public/' . $imageName);

            $this->prev_img_thumb = $imageName;
        }

        if (!$this->published_at && $this->is_published) {
            $this->published_at = date("Y-m-d H:i:s");
        }

        parent::save();
    }

    public function url ()
    {
        return route('articles.show', [
            'article'   => $this->id,
            'slug'      => $this->slug,
        ]);
    }
}
