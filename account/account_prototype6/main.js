let contentToast = document.getElementById('nontification')
let btnClose = document.getElementById('btn-close')

console.log(contentToast)

btnClose.onclick=function(){
    contentToast.classList.replace("show", "hide")
  }
  
  setTimeout(() => {
    contentToast.classList.replace("show", "hide")
  }, 7000);