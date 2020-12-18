import Vue from 'vue';

const screens = {
  sm: 480,
  md: 768,
  lg: 992,
  xl: 1200
}

const sm = val => val >= screens.sm && val <= screens.md
const md = val => val >= screens.md && val <= screens.lg
const lg = val => val >= screens.lg && val <= screens.xl
const xl = val => val >= screens.xl

const getBreakpoint = w => {
  if (sm(w)) return 'sm'
  else if (md(w)) return 'md'
  else if (lg(w)) return 'lg'
  else if (xl(w)) return 'xl'
  else return 'all'
}
const debounce = function(func, wait) {
  var timeout
  return () => {
    const later = function() {
      timeout = null
    }
    const callNow = !timeout
    clearTimeout(timeout)
    timeout = setTimeout(later, wait)
    if (callNow) func()
  }
}

const breakpoints = Vue.observable({
  w: window.innerWidth,
  h: window.innerHeight,
  is: getBreakpoint(window.innerWidth)
})

window.addEventListener(
  'resize',
  debounce(() => {
    breakpoints.w = window.innerWidth
    breakpoints.h = window.innerHeight
    breakpoints.is = getBreakpoint(window.innerWidth)
  }, 200),
  false
)

export default breakpoints;
