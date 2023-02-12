const bigImg = document.querySelector(".product-content-left-big-img img")
const smallImg = document.querySelectorAll(".product-content-left-small-img img")
smallImg.forEach(function(imgItem,X){
    imgItem.addEventListener("click",function(){
        bigImg.src = imgItem.src
    })
})

const noidung = document.querySelector(".noidung")
const tacgia = document.querySelector(".tacgia")
if(noidung){
    noidung.addEventListener("click",function()
    {
        document.querySelector(".product-content-right-bottom-content-tacgia").style.display="none"
        document.querySelector(".product-content-right-bottom-content-noidung").style.display="block"
    })
}
if(tacgia){
    tacgia.addEventListener("click",function()
    {
        document.querySelector(".product-content-right-bottom-content-tacgia").style.display="block"
        document.querySelector(".product-content-right-bottom-content-noidung").style.display="none"
    })
}
const butTon = document.querySelector(".product.content-right-bottom-top")
if(botTom){
    botTom.addEventListener("click",function()
    {
        document.querySelector(".product-content-right-bottom-content-big").classList.toggle("activeB")
    })
}