const html = document.getElementsByTagName('html')[0]
const modals = document.getElementsByClassName('modal')
const triggers = document.getElementsByClassName('modal-trigger')

/*
const boxen = document.getElementsByClassName('box')

Array.from(boxen).forEach( function(box) {
  let image = box.getElementsByTagName('img')[0]
  image.onload = function() {
    let height = image.naturalHeight
    let width = image.naturalWidth
    box.style.maxHeight = height + 'px'
    box.style.maxWidth = width + 'px'
  }
}) 
*/

Array.from(triggers).forEach( function(trigger) {
  let id = trigger.dataset.target
  trigger.addEventListener('click', function() {
      html.classList.add('is-clipped')
      document.getElementById(id).classList.add('is-active')
  })
})

Array.from(modals).forEach( function(modal) {
  let background = modal.getElementsByClassName('modal-background')[0]
  let close = modal.getElementsByClassName('modal-x')[0];
  let deleteButton = modal.getElementsByClassName('is-danger')[0];
  let id = modal.getAttribute('id')
  let modalType = modal.dataset.type

  close.addEventListener('click', function() {
      html.removeAttribute('class')
      modal.classList.remove('is-active')
  })

  if(modalType == 'view') {
    background.addEventListener('click', function() {
      html.removeAttribute('class')
      modal.classList.remove('is-active')
    })
  }

  if(modalType == 'delete' || modalType == 'settings') {
    modal.getElementsByClassName('cancel')[0].addEventListener('click', function() {
      html.removeAttribute('class')
      modal.classList.remove('is-active')
    })
    deleteButton.addEventListener('click', function() {
      let username = document.getElementById('past-username').value
      let password = document.getElementById('past-password').value
      let trigger = document.getElementById('trigger-' + id).parentNode
      let deleteTarget = deleteButton.dataset.target
      html.removeAttribute('class')
      modal.classList.remove('is-active')
      fetch('index.php', { /////////////////////////
        method: 'POST',
        headers: {
          'Content-type': 'application/x-www-form-urlencoded; charset=UTF-8'
        },
        body: 'operation=delete&image=' + deleteTarget + '&username=' + username + '&password=' + password
      }).then( function(response) {
        if (response.ok) {
          return response.text()
        } else {
          return 'Failed'
        }
      }).then( function(text) {
        if (text == 'Deletion successful.') {
          modal.parentNode.removeChild(modal)
          trigger.parentNode.removeChild(trigger)
        }
      })
    })
  }
})

document.addEventListener('keydown', function(event) {
  if (event.defaultPrevented) {
    return;
  }
  let key = event.key || event.keyCode
  if (key === 'Escape' || key === 'Esc' || key === 27) { 
    if (html.hasAttribute('class')) {
      html.removeAttribute('class')
    }
    Array.from(modals).forEach( function(modal) {
      let id = modal.getAttribute('id')
      let target = document.getElementById(id)
      if (target.classList.contains('is-active')) {
        target.classList.remove('is-active')
      }
    })
  }
})