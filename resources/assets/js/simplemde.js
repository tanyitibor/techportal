import SimpleMDE from 'simplemde'

window['editorConfig'] = {
  element: document.querySelector('textarea.simple-mde'),
  spellChecker: false,
  promptURLs: true
}

window['initEditor'] = function () {
  /* eslint-disable no-new */
  new SimpleMDE(editorConfig)
  /* eslint-enable no-new */
}
