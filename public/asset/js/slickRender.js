
    $('.slick-slider-horizontal').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        adaptiveHeight: true,
        slidesToScroll: 1,
        slide: 'div',
        prevArrow: '<button class="slide-arrow prev-arrow"><i class="fa-solid fa-caret-left"></i></button>',
        nextArrow: '<button class="slide-arrow next-arrow"><i class="fa-solid fa-caret-right"></i></button>',
        responsive: [
            {
              breakpoint: 768,
                settings:{
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    vertical: false,
                    centerMode:false,
                    prevArrow: '<button class="slide-arrow -left-4"><i class="fa-solid fa-caret-left"></i></button>',
                    nextArrow: '<button class="slide-arrow -right-4"><i class="fa-solid fa-caret-right"></i></button>'
                  },
            },
            {
                breakpoint: 1024,
                  settings:{
                      slidesToShow: 2,
                      slidesToScroll: 1,
                      centerMode:true,
                      
                    },
              }
        ]
    });
// function to call api and render
function renderMovie(data){
    for (let i = 0; i < data.length; i++) {
        
        const detailMovieURL =`https://ophim1.com/phim/${data[i]}`
        fetch(detailMovieURL)
            .then(data => data.json())
            .catch()
            .then(data => {
                const movieInfo = data['movie']
                // ongoing film
                if (movieInfo['status'] == 'ongoing' && document.querySelector('#top-movie-banner') && document.querySelector('#top-movies')) {
                    const bannerElm =`
                    <img class="w max-w-full lg:h-h h-full object-center object-cover"
                        src="${movieInfo['poster_url'] || './asset/img/back-gr-login.jpg'}"
                        alt="">
                    `
                    const elm =`
                    <div class="parent transition-all duration-500 movie-preview w-full py-2 relative">
                    <img class="w-full h-full"
                        src="${movieInfo['poster_url'] || './asset/img/back-gr-login.jpg'}"
                        alt="">
                    <div class="child-overlay relative">
                        <div class="ver-bar"></div>
                    </div>
                    <div class="absolute top-1/2 transform -translate-y-1/2 pl-2 left-4">
                        <h2 class="h-6 overflow-hidden"> ${movieInfo['name']}</h2>
                        <h4>${movieInfo['time']}</h4>
                        <a href='./detail/${movieInfo['slug']}' class="btn-primary mt-4">
                            <span class="block mr-2">
                                <i class="fa-solid fa-play"></i>
                            </span>
                            Play now
                        </a>
                    </div>

                </div>
                    `

                    $('#top-movie-banner').slick('slickAdd', bannerElm)
                    $('#top-movies').slick('slickAdd', elm)

                }
                // feature film
                if (movieInfo['episode_total']==1 && document.querySelector('.slick-slider-horizontal#feature-movies')) {
                    
                    const elm =`
                    <div
                                class="parent transform hover:scale-105 transition-all duration-500 movie-preview w-1/2 px-2 relative h-64 md:w-1/4 md:h-48">
                                <img class="w-full h-full"
                                    src="${movieInfo['poster_url'] || './asset/img/back-gr-login.jpg'}"
                                    alt="">
                                <div class="child-overlay relative">
                                    <div class="ver-bar"></div>
            
                                    <div class="side-action flex-col justify-around absolute right-4 top-1/2 -translate-y-1/2">
                                        <div class="circle-action relative">
                                            <i class="fa-solid fa-share-nodes"></i>
                                            <div
                                                class="-z-10 absolute right-full hidden justify-center top-1/2 transform -translate-y-1/2 h-8 bg-black items-center">
                                                <a href="" class="p-2 text-hover pr-3"><i class="fa-brands fa-twitter"></i></a>
                                                <a href="" class="p-2 text-hover pr-3"><i class="fa-brands fa-twitter"></i></a>
            
                                            </div>
                                        </div>
                                        <div class="circle-action relative">
                                            <i class="fa-solid fa-heart"></i>
                                            <div
                                                class="-z-10 absolute right-full hidden justify-center top-1/2 transform -translate-y-1/2 h-8 bg-black items-center">
                                                <a href="" class="p-2 text-hover pr-3"><i class="fa-brands fa-twitter"></i></a>
            
                                            </div>
                                        </div>
                                        <div class="circle-action relative">
                                            <i class="fa-solid fa-add"></i>
                                            <div
                                                class="-z-10 absolute right-full hidden justify-center top-1/2 transform -translate-y-1/2 h-8 bg-black items-center">
                                                <a href="" class="p-2 text-hover pr-3"><i class="fa-brands fa-twitter"></i></a>
            
                                            </div>
                                        </div>
            
                                    </div>
                                </div>
                                <div class="absolute top-1/2 transform -translate-y-1/2 pl-2 left-4">
                                    <h2>${movieInfo['name']}</h2>
                                    <h4>${movieInfo['time'] || 'Trailer'}</h4>
                                    <a href='../detail/${movieInfo['slug']}' class="btn-primary mt-4">
                                        <span class="block mr-2">
                                            <i class="fa-solid fa-play"></i>
                                        </span>
                                        Play now
                                    </a>
                                </div>
            
                            </div>`
                    $('.slick-slider-horizontal#feature-movies').slick('slickAdd', elm)
                }
                
                // series film
                if (movieInfo['type']=='series' && document.querySelector('.slick-slider-horizontal#long-movies')){
                    const elma =`
                    <div
                                class="parent transform hover:scale-105 transition-all duration-500 movie-preview w-1/2 px-2 relative h-64 md:w-1/4 md:h-48">
                                <img class="w-full h-full"
                                    src="${movieInfo['poster_url'] || './asset/img/back-gr-login.jpg'}"
                                    alt="">
                                <div class="child-overlay relative">
                                    <div class="ver-bar"></div>
            
                                    <div class="side-action flex-col justify-around absolute right-4 top-1/2 -translate-y-1/2">
                                        <div class="circle-action relative">
                                            <i class="fa-solid fa-share-nodes"></i>
                                            <div
                                                class="-z-10 absolute right-full hidden justify-center top-1/2 transform -translate-y-1/2 h-8 bg-black items-center">
                                                <a href="" class="p-2 text-hover pr-3"><i class="fa-brands fa-twitter"></i></a>
                                                <a href="" class="p-2 text-hover pr-3"><i class="fa-brands fa-twitter"></i></a>
            
                                            </div>
                                        </div>
                                        <div class="circle-action relative">
                                            <i class="fa-solid fa-heart"></i>
                                            <div
                                                class="-z-10 absolute right-full hidden justify-center top-1/2 transform -translate-y-1/2 h-8 bg-black items-center">
                                                <a href="" class="p-2 text-hover pr-3"><i class="fa-brands fa-twitter"></i></a>
            
                                            </div>
                                        </div>
                                        <div class="circle-action relative">
                                            <i class="fa-solid fa-add"></i>
                                            <div
                                                class="-z-10 absolute right-full hidden justify-center top-1/2 transform -translate-y-1/2 h-8 bg-black items-center">
                                                <a href="" class="p-2 text-hover pr-3"><i class="fa-brands fa-twitter"></i></a>
            
                                            </div>
                                        </div>
            
                                    </div>
                                </div>
                                <div class="absolute top-1/2 transform -translate-y-1/2 pl-2 left-4">
                                    <h2>${movieInfo['name']}</h2>
                                    <h4>${movieInfo['time'] || 'Trailer'}</h4>
                                    <a href='../detail/${movieInfo['slug']}' class="btn-primary mt-4">
                                        <span class="block mr-2">
                                            <i class="fa-solid fa-play"></i>
                                        </span>
                                        Play now
                                    </a>
                                </div>
            
                            </div>`
                    $('.slick-slider-horizontal#long-movies').slick('slickAdd', elma)
                }
                if (document.querySelector('#cartoon-movies') && movieInfo['type']=='hoathinh') {
                    const elm =`
                    <div
                    class="parent transform hover:scale-105 transition-all duration-500 movie-preview w-1/2 px-2 relative h-64 md:w-1/4 md:h-48">
                    <img class="w-full h-full"
                        src="${movieInfo['poster_url'] || './asset/img/back-gr-login.jpg'}"
                        alt="">
                    <div class="child-overlay relative">
                        <div class="ver-bar"></div>

                        <div class="side-action flex-col justify-around absolute right-4 top-1/2 -translate-y-1/2">
                            <div class="circle-action relative">
                                <i class="fa-solid fa-share-nodes"></i>
                                <div
                                    class="-z-10 absolute right-full hidden justify-center top-1/2 transform -translate-y-1/2 h-8 bg-black items-center">
                                    <a href="" class="p-2 text-hover pr-3"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="" class="p-2 text-hover pr-3"><i class="fa-brands fa-twitter"></i></a>

                                </div>
                            </div>
                            <div class="circle-action relative">
                                <i class="fa-solid fa-heart"></i>
                                <div
                                    class="-z-10 absolute right-full hidden justify-center top-1/2 transform -translate-y-1/2 h-8 bg-black items-center">
                                    <a href="" class="p-2 text-hover pr-3"><i class="fa-brands fa-twitter"></i></a>

                                </div>
                            </div>
                            <div class="circle-action relative">
                                <i class="fa-solid fa-add"></i>
                                <div
                                    class="-z-10 absolute right-full hidden justify-center top-1/2 transform -translate-y-1/2 h-8 bg-black items-center">
                                    <a href="" class="p-2 text-hover pr-3"><i class="fa-brands fa-twitter"></i></a>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="absolute top-1/2 transform -translate-y-1/2 pl-2 left-4">
                        <h2>${movieInfo['name']}</h2>
                        <h4>${movieInfo['time']}</h4>
                        <a href='./detail/${movieInfo['slug']}' class="btn-primary mt-4">
                            <span class="block mr-2">
                                <i class="fa-solid fa-play"></i>
                            </span>
                            Play now
                        </a>
                    </div>

                    </div>`
                    $('#cartoon-movies').slick('slickAdd', elm);
                }
                
            })
    }

}

var callApiData = function(page){
    for (let i = 0; i < page.length; i++) {
        const url = `https://ophim1.com/danh-sach/phim-moi-cap-nhat?page=${page[i]}`;
    
        fetch(url)
            .then(res => res.json())
            .catch()
            .then(data => {
                const listSlugs = data['items'].map((a)=>{
                    return a['slug']
                })

                if (i==0) {
                    for (let i = 0; i < 4; i++) {
                        if (document.querySelector('#upcoming_movies') && i<4) {
                            const detailMovieURL =`https://ophim1.com/phim/${listSlugs[i]}`
                            fetch(detailMovieURL)
                                    .then(data => data.json())
                                    .catch()
                                    .then(data => {
                                        const movieInfo = data['movie']
                                        const elm =`
                                        <div
                                        class="parent transform hover:scale-105 transition-all duration-500 movie-preview px-2 relative h-64 md:w-1/4 md:h-48">
                                        <img class="w-full h-full"
                                            src="${movieInfo['poster_url'] || './asset/img/back-gr-login.jpg'}"
                                            alt="">
                                        <div class="child-overlay relative">
                                            <div class="ver-bar"></div>
                    
                                            <div class="side-action flex-col justify-around absolute right-4 top-1/2 -translate-y-1/2">
                                                <div class="circle-action relative">
                                                    <i class="fa-solid fa-share-nodes"></i>
                                                    <div
                                                        class="-z-10 absolute right-full hidden justify-center top-1/2 transform -translate-y-1/2 h-8 bg-black items-center">
                                                        <a href="" class="p-2 text-hover pr-3"><i class="fa-brands fa-twitter"></i></a>
                                                        <a href="" class="p-2 text-hover pr-3"><i class="fa-brands fa-twitter"></i></a>
                    
                                                    </div>
                                                </div>
                                                <div class="circle-action relative">
                                                    <i class="fa-solid fa-heart"></i>
                                                    <div
                                                        class="-z-10 absolute right-full hidden justify-center top-1/2 transform -translate-y-1/2 h-8 bg-black items-center">
                                                        <a href="" class="p-2 text-hover pr-3"><i class="fa-brands fa-twitter"></i></a>
                    
                                                    </div>
                                                </div>
                                                <div class="circle-action relative">
                                                    <i class="fa-solid fa-add"></i>
                                                    <div
                                                        class="-z-10 absolute right-full hidden justify-center top-1/2 transform -translate-y-1/2 h-8 bg-black items-center">
                                                        <a href="" class="p-2 text-hover pr-3"><i class="fa-brands fa-twitter"></i></a>
                    
                                                    </div>
                                                </div>
                    
                                            </div>
                                        </div>
                                        <div class="absolute top-1/2 transform -translate-y-1/2 pl-2 left-4">
                                            <h2>${movieInfo['name']}</h2>
                                            <h4>${movieInfo['time']}</h4>
                                            <a href='./detail/${movieInfo['slug']}' class="btn-primary mt-4">
                                                <span class="block mr-2">
                                                    <i class="fa-solid fa-play"></i>
                                                </span>
                                                Play now
                                            </a>
                                        </div>
                    
                                    </div>`
                                    $('#upcoming_movies').slick('slickAdd', elm)
                                    })
                        }
                        if (document.querySelector('#suggest-big') && i==1) {
                            const detailMovieURL =`https://ophim1.com/phim/${listSlugs[i]}`
                            fetch(detailMovieURL)
                                    .then(data => data.json())
                                    .catch()
                                    .then(data => {
                                        const movieInfo = data['movie']
                                        const elm =`
                                        <div class="h-4/5 min-h-max w-full relative text-white flex flex-col lg:flex-row  justify-between items-center bg-fixed bg-center bg-cover"
                                        style="background-image: url('${movieInfo['poster_url']}');">
                                        <div class="child-overlay opacity-100"></div>
                                        <div class="z-10 p-8 lg:p-20 w-full lg:w-2/5">
                                            <div class="w-64 gradient-bg grad px-4 py-2 ver-bar relative">
                                                <a href="">
                                                    <img src="./asset/img/logo.png" alt="" class="w-36">
                                                </a>
                                            </div>
                                            <h1 class="uppercase text-3xl md:text-4xl lg:text-5xl font-bold text-white">${movieInfo['name']}</h1>
                                            <div class="flex my-3 w-84 items-center text-white">
                                                <div class="flex text-red-600 mr-4">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p class=" mr-4">${movieInfo['episode_total']}</p>
                                                <div class="flex items-center">
                                                    <div class="mr-2 w-8 h-8 leading-8 bg-gray-500 text-white text-center font-bold">GP
                                                    </div>
                                                    <p>${movieInfo['time']}</p>
                                                </div>
                                            </div>
                                            <div class="overflow-y-auto max-h-32"">
                                                <p class="text-justify overflow-hidden max-h-32">
                                                ${movieInfo['content'].substr(3, movieInfo['content'].length - 7)}
                                                </p>
                                            </div>
                                            <div class=" font-semibold text-lg mt-4">
                                                <ul>
                                                ${movieInfo['actor'] ? movieInfo['actor'].map((act,idx) => {
                                                    if (idx < 4) {
                                                        return `<li class="flex ">
                                                                    <p>
                                                                    <h4 class="text-red-600 mr-3">Starring</h4> ${act}</p>
                                                                </li>`
                                                    }
                                                }).join('') : `<h4 class="text-red-600 mr-3">Updating</h4>`
                                            }
                                                </ul>
                                            </div>
                                            <a href='./detail/${movieInfo['slug']}' class="btn-primary mt-4">
                                                <span class="block mr-2">
                                                    <i class="fa-solid fa-play"></i>
                                                </span>
                                                Play now
                                            </a>
                                        </div>
                                        <div class="z-10 mb-4 lg:p-20 w-full  lg:w-3/5 flex">
                                            <img class="w-4/5 m-auto"
                                                src="${movieInfo['poster_url']}"
                                                alt="">
                                        </div>
                                    </div>`
                                    $('#suggest-big').append(elm)
                                    })
                        }
                        if (document.querySelector('#banner-slick')) {
                            const detailMovieURL =`https://ophim1.com/phim/${listSlugs[i]}`
                                fetch(detailMovieURL)
                                        .then(data => data.json())
                                        .catch()
                                        .then(data => {
                                            const movieInfo = data['movie']
                                            const elm =`
                                            <div class="h-screen relative text-white">
                                            <img src="${movieInfo['poster_url'] || './asset/img/back-gr-login.jpg'}"
                                                alt="" class="h-full w-full select-none object-center object-none md:object-fill">
                                            <div class="h-full py-32 px-8 lg:px-20 absolute top-1/2 left-0 transform -translate-y-1/2 w-full  lg:w-2/5 bg-black bg-gradient-to-r from-neutral-700 bg-opacity-0">
                                                <div class="w-64 gradient-bg grad px-4 py-2 ver-bar relative">
                                                    <a href="">
                                                        <img src="./asset/img/logo.png" alt="" class="w-36">
                                                    </a>
                                                </div>
                                                <h1 class="uppercase text-2xl md:text-4xl lg:text-5xl font-bold text-white py-2">${movieInfo['name']}</h1>
                                                <div class="flex my-3 w-84 items-center text-white">
                                            
                                                    <p class=" mr-4">${movieInfo['episode_total']}</p>
                                                    <div class="flex items-center">
                                                        <div class="mr-2 w-8 h-8 leading-8 bg-gray-500 text-white text-center font-bold">GP</div>
                                                        <p>${movieInfo['time']}</p>
                                                    </div>
                                                </div>
                                                <div class="text-justify overflow-y-auto max-h-32">
                                                    <p class="text-justify overflow-y-auto max-h-32">${movieInfo['content'].substr(3, movieInfo['content'].length - 7)}</p>
                                                </div>
                                                <div class=" font-semibold text-lg mt-4">
                                                    <ul>
                                                        ${movieInfo['actor'].map((act,idx) => {
                                                            if (idx < 4) {
                                                                return `<li class="flex ">
                                                                            <p>
                                                                            <h4 class="text-red-600 mr-3">Starring</h4> ${act}</p>
                                                                        </li>`
                                                            }
                                                        }).join('')
                                                    }
                                                        
                                                    
                                                    </ul>
                                                </div>
                                                <a href='./detail/${movieInfo['slug']}' class="btn-primary mt-4">
                                                    <span class="block mr-2">
                                                        <i class="fa-solid fa-play"></i>
                                                    </span>
                                                    Play now
                                                </a>
                                            </div>
                                            <div class="hidden lg:flex justify-center absolute top-1/2 right-4 transform -translate-y-1/2 w-3/5">
                                                <a href="" class="text-5xl">
                                                    <div class="btn-play flex items-center">
                                                        <svg width="110" height="110">
                                                            <circle class="btn-backgr" r="50" cy="55" cx="55" />
                                                            <circle class="foreground" r="50" cy="55" cx="55" />
                                                            <polygon class="triangle-bg" points="38 28, 80 55, 38 80" />
                                                            <polygon class="triangle-fore" points="38 28, 80 55, 38 80" />
    
                                                        </svg>
                                                        <h2 class="text-gray-300 ml-2">Watch trailer</h2>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>`
                                        $('#banner-slick').slick('slickAdd', elm)
                                        })
                            
                        }

                    }
                }
                
                renderMovie(listSlugs)
            }
            )
            
    }


}

$('#upcoming_movies').slick({
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    adaptiveHeight: true,
    slidesToScroll: 1,
    responsive: [
        {
          breakpoint: 768,
            settings:{
                slidesToShow: 1,
                slidesToScroll: 1,
                vertical: false,
                centerMode:false,
                prevArrow: '<button class="slide-arrow -left-4"><i class="fa-solid fa-caret-left"></i></button>',
                nextArrow: '<button class="slide-arrow -right-4"><i class="fa-solid fa-caret-right"></i></button>'
              },
        }
    
    ]
});


