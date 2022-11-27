function listMovie(type,page){
    for (let i = 0; i < page.length; i++) {
        const api = `https://ophim1.com/danh-sach/phim-moi-cap-nhat?page=${page[i]}`;
        fetch(api)
            .then(res => res.json())
            .then(data => {
                const listSlugs = data['items'].map((a)=>{
                    return a['slug']
                })

                switch (type) {
                    case 'series':
                        listSlugs.forEach(slug => {
                            const detailMovieURL =`https://ophim1.com/phim/${slug}`
                            fetch(detailMovieURL)
                                .then(res => res.json())
                                .then(data => {
                                    const movieInfo = data['movie']
                                    if (movieInfo['type'] == 'series') {
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

                                                                </div>
                                                                <div class="circle-action relative">
                                                                <a href="/add-favorite/${movieInfo['slug']}">
                                                                <i class="fa-solid fa-heart"></i>
                                                                </a>
                                                                </div>
                                                                <div class="circle-action relative">
                                                                    <i class="fa-solid fa-add"></i>

                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="absolute top-1/2 transform -translate-y-1/2 pl-2 left-4">
                                                            <h2>${movieInfo['name']}</h2>
                                                            <h4>${movieInfo['time'] || 'Trailer'}</h4>
                                                            <a href='${window.location.origin}/${movieInfo['slug']}' class="btn-primary mt-4">
                                                                <span class="block mr-2">
                                                                    <i class="fa-solid fa-play"></i>
                                                                </span>
                                                                Play now
                                                            </a>
                                                        </div>

                                                    </div>`
                                        $('#same-movies').slick('slickAdd', elma)
                                    }
                                })
                        });
                        break;
                    case 'single':
                        listSlugs.forEach(slug => {
                            const detailMovieURL =`https://ophim1.com/phim/${slug}`
                            fetch(detailMovieURL)
                                .then(res => res.json())
                                .then(data => {
                                    const movieInfo = data['movie']
                                    if (movieInfo['type'] == 'single') {
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

                                                                </div>
                                                                <div class="circle-action relative">
                                                                <a href="/add-favorite/${movieInfo['slug']}">
                                                                <i class="fa-solid fa-heart"></i>
                                                                </a>

                                                                </div>
                                                                <div class="circle-action relative">
                                                                    <i class="fa-solid fa-add"></i>

                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="absolute top-1/2 transform -translate-y-1/2 pl-2 left-4">
                                                            <h2>${movieInfo['name']}</h2>
                                                            <h4>${movieInfo['time'] || 'Trailer'}</h4>
                                                            <a href='${window.location.origin}/detail/${movieInfo['slug']}' class="btn-primary mt-4">
                                                                <span class="block mr-2">
                                                                    <i class="fa-solid fa-play"></i>
                                                                </span>
                                                                Play now
                                                            </a>
                                                        </div>

                                                    </div>`
                                        $('#same-movies').slick('slickAdd', elma)
                                    }
                                })
                        });
                        break
                    default:
                        break;
                }
            })
    }
}
