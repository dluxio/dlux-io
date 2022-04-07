export default {
  props: ['title', 'tip'],
  template: `<a href="#" data-bs-toggle="tooltip" :title="title">{{ tip }}</a>`
}