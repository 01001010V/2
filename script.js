const form = document.querySelector('form'),
  statusTxt = form.querySelector('.button-area span')

form.onsubmit = e => {
  e.preventDefault() // preventing form from submitting
  statusTxt.style.color = '#0D6EFd'
  statusTxt.style.display = 'block'

  let xhr = new XMLHttpRequest() // creatinf new xlm objetc
  xhr.open('POST', 'message.php', true) // sending post request to message.php file
  xhr.onload = () => {
    //once ajax loaded
    if (xhr.readyState == 4 && xhr.status == 200) {
      //if ajax response status is 200 & ready status is 4 means there is no any error
      let response = xhr.response // storing ajax response in a response variable
      if (
        response.indexOf('Os campos de email e mensagem estão vazios!') != -1 ||
        response.indexOf('Digite um endereço de e-mail válido!') ||
        response.indexOf('Desculpe não conseguiu enviar sua mensagem!')
      ) {
        statusTxt.style.color = 'red'
      } else {
        form.reset()
        setTimeout(() => {
          statusTxt.style.display = 'none'
        }, 3000)
      }
      statusTxt.innerText = response
    }
  }

  let formData = new FormData(form) // creating new FormData obj. This obj is used to send form data
  xhr.send(formData) // Seding form data
}
