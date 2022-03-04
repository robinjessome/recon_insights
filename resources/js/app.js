require('./bootstrap');

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus'
import collapse from '@alpinejs/collapse'

import tippy from 'tippy.js';
import 'tippy.js/dist/tippy.css';

import flatpickr from "flatpickr";
import Quill from 'quill'

import EditorJS from '@editorjs/editorjs';
import Header from '@editorjs/header'; 
import List from '@editorjs/list'; 


window.Alpine = Alpine;


document.addEventListener('alpine:init', () => {
  // Magic: $tooltip
  Alpine.magic('tooltip', el => message => {
      let instance = tippy(el, { content: message, trigger: 'manual' })

      instance.show()

      setTimeout(() => {
          instance.hide()

          setTimeout(() => instance.destroy(), 150)
      }, 2000)
  })

  // Directive: x-tooltip
  Alpine.directive('tooltip', (el, { expression }) => {
      tippy(el, { content: expression })
  })

})

Alpine.plugin(focus);
Alpine.plugin(collapse);
Alpine.start();


// document.addEventListener("DOMContentLoaded", function(event) {





//   document.addEventListener('alpine:init', () => {
//     console.log('alpine?');
//     // Magic: $tooltip
//     Alpine.magic('tooltip', el => message => {
//         let instance = tippy(el, { content: message, trigger: 'manual' })
  
//         instance.show()
  
//         setTimeout(() => {
//             instance.hide()
  
//             setTimeout(() => instance.destroy(), 150)
//         }, 2000)
//     })
  
//     // Directive: x-tooltip
//     Alpine.directive('tooltip', (el, { expression }) => {
//         tippy(el, { content: expression })
//     })
//   })



// });







// // Quill rich text editor

// var toolbarOptions = [
//   ['bold', 'italic'], // toggled buttons
//   ['blockquote'],['link'],
//   [{ 'list': 'ordered'}, { 'list': 'bullet' }],
//   [{ 'script': 'super' }], // superscript/subscript


//   // [{ 'align': [] }],

//   ['clean'] // remove formatting button
// ];

// var quillOpts = {
//   debug: 'info',
//   modules: {
//     toolbar: toolbarOptions
//   },
//   placeholder: 'Compose an epic...',
//   theme: 'snow'
// };
// var container = document.getElementById('editor');
// var editor = new Quill(container, quillOpts);


// rich text editor editor.js
// const editor = new EditorJS();
// const editor = new EditorJS({ 
//     /** 
//      * Id of Element that should contain the Editor 
//      */ 
//     holder: 'editorjs', 
    
//     /** 
//      * Available Tools list. 
//      * Pass Tool's class or Settings object for each Tool you want to use 
//      */ 
//     tools: { 
//       header: Header, 
//       list: List 
//     }, 
//   })


  // editor.save().then((outputData) => {
  //   console.log('Article data: ', outputData)
  // }).catch((error) => {
  //   console.log('Saving failed: ', error)
  // });
