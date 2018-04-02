// ——————————————————————————————————————————————————
// TextScramble
// ——————————————————————————————————————————————————

class TextScramble {
  constructor(el) {
    this.el = el
    this.chars = '!<>-_\\/[]{}—=+*^?#________'
    this.update = this.update.bind(this)
  }
  setText(newText) {
    if (this.el) {
      const oldText = this.el.innerText
      const length = Math.max(oldText.length, newText.length)
      const promise = new Promise((resolve) => this.resolve = resolve)
      this.queue = []
      for (let i = 0; i < length; i++) {
        const from = oldText[i] || ''
        const to = newText[i] || ''
        const start = Math.floor(Math.random() * 40)
        const end = start + Math.floor(Math.random() * 40)
        this.queue.push({ from, to, start, end })
      }
      cancelAnimationFrame(this.frameRequest)
      this.frame = 0
      this.update()
      return promise
    }
  }
  update() {
    let output = ''
    let complete = 0
    for (let i = 0, n = this.queue.length; i < n; i++) {
      let { from, to, start, end, char } = this.queue[i]
      if (this.frame >= end) {
        complete++
        output += to
      } else if (this.frame >= start) {
        if (!char || Math.random() < 0.28) {
          char = this.randomChar()
          this.queue[i].char = char
        }
        output += `<span class="dud">${char}</span>`
      } else {
        output += from
      }
    }
    this.el.innerHTML = output
    if (complete === this.queue.length) {
      this.resolve()
    } else {
      this.frameRequest = requestAnimationFrame(this.update)
      this.frame++
    }
  }
  randomChar() {
    return this.chars[Math.floor(Math.random() * this.chars.length)]
  }
}

// ——————————————————————————————————————————————————
// Example
// ——————————————————————————————————————————————————

$(document).ready(function(){
  const phrases1 = [
    'Hello World.'
  ]
  const el1 = document.querySelector('.dynamic-text1')

  if (el1) {
    const fx1 = new TextScramble(el1)
    let counter1 = 0
    const next1 = () => {
      fx1.setText(phrases1[counter1]).then(() => {
        setTimeout(next1, 10000)
      })
      // counter = (counter + 1) % phrases.length
    }
    next1()

    const phrases2 = [
      'We are Ratneko.'
    ]
    const el2 = document.querySelector('.dynamic-text2')
    const fx2 = new TextScramble(el2)
    let counter2 = 0
    const next2 = () => {
      fx2.setText(phrases2[counter2]).then(() => {
        setTimeout(next2, 10000)
      })
      // counter = (counter + 1) % phrases.length
    }
    next2()

    const phrases3 = [
      'Try move Programmatically'
    ]
    const el3 = document.querySelector('.dynamic-text3')
    const fx3 = new TextScramble(el3)
    let counter3 = 0
    const next3 = () => {
      fx3.setText(phrases3[counter3]).then(() => {
        setTimeout(next3, 10000)
      })
      // counter = (counter + 1) % phrases.length
    }
    next3()
  }
})

var elem = document.querySelector('.sidenav');
  var instance = M.Sidenav.init(elem, {
});
$(document).ready(function(){
  $('.sidenav').sidenav();
});
