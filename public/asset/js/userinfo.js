// change img
const cmr= document.querySelector('.change-img')
cmr.addEventListener('click', ()=>{
    document.getElementById('change-img-form').classList.remove('hidden')
})

const cancel= document.querySelector('#cancel-file-input')
cancel.addEventListener('click', ()=>{
    document.getElementById('change-img-form').classList.add('hidden')
})

// chang account
const acc= document.querySelector('#change-account')
acc.addEventListener('click', ()=>{
    document.getElementById('change-account-form').classList.remove('hidden')
})

const cancelAcc= document.querySelector('#cancel-account-input')
cancelAcc.addEventListener('click', ()=>{
    document.getElementById('change-account-form').classList.add('hidden')
})


// upload avt
const file = document.getElementById('avt-file-input')
var uploaded_img=""
file.addEventListener('change', (e)=>{
    const reader = new FileReader();
    const btnClose = document.querySelector('.img-frame span')
    reader.addEventListener('load',()=>{
        uploaded_img = reader.result
        document.querySelector('.img-frame').style.backgroundImage =`url(${uploaded_img})`
        document.querySelector('.img-frame h1').classList.add('hidden')
        btnClose.classList.remove('hidden')
        btnClose.addEventListener('click', ()=>{
            document.querySelector('.img-frame').style.backgroundImage =`url(./asset/img/back-gr-login.jpg)`
            document.querySelector('.img-frame h1').classList.remove('hidden')
            btnClose.classList.add('hidden')
        })
    })
    reader.readAsDataURL(e.target.files[0])
})

$('#recent-movies').slick({
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    prevArrow: '<button class="slide-arrow prev-arrow"><i class="fa-solid fa-caret-left"></i></button>',
    nextArrow: '<button class="slide-arrow next-arrow"><i class="fa-solid fa-caret-right"></i></button>',
    responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
          }
        },
        {
            breakpoint: 748,
            settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            infinite: true,
          }
        },
        {
            breakpoint: 400,
            settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
          }
        }
    ]
})