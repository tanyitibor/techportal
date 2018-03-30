import SimpleMDE from 'simplemde'

window['initEditor'] = function () {
  /* eslint-disable no-new */
  new SimpleMDE({
    element: document.querySelector('textarea.simple-mde'),
    spellChecker: false,
    promptURLs: true
  })
  /* eslint-enable no-new */
}
