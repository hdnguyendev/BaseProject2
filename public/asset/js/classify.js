const typesMovie ={
    hanhdong:"Hành Động",
    tinhcam:"Tình Cảm",
    haihuoc:"Hài Hước",
    cotrang:"Cổ Trang",
    tamly:"Tâm Lý",
    hinhsu:"Hình Sự",
    chientranh:"Chiến Tranh",
    thethao:"Thể Thao",
    vothuat:"Võ Thuật",
    vientuong:"Viễn Tưởng",
    phieuluu:"Phiêu Lưu",
    khoahoc:"Khoa Học",
    kinhdi:"Kinh Dị",
    amnhac:"Âm Nhạc",
    thanthoai:"Thần Thoại",
    tailieu:"Tài Liệu",
    giadinh:"Gia Đình",
    chinhkich:"Chính kịch",
    bian:"Bí ẩn",
    hocduong:"Học Đường",
    kinhdien:"Kinh Điển",
    phim18:"Phim 18+"
}

const box = document.getElementById('box')
const loadMore = document.getElementById('load-more')

async function getListSlug(type) {
    let count =12;
    let listSlugs=[]
    let listTypeSlugs=[]
    let list=[]
    for (let i = 1; i <= 10; i++) {
        try {
            const apiPage = `https://ophim1.com/danh-sach/phim-moi-cap-nhat?page=${i}`;
            const res = await fetch(apiPage)
            const data = await res.json()
            data['items'].forEach(item => {
                listSlugs.push(item['slug'])
            });
            
        } catch (error) {
            
        }
    }
    if (type=='single' || type =='series') {
        for (let i = 0; i < 100; i++) {
            const apiPage = `https://ophim1.com/phim/${listSlugs[i]}`;
            try {
                    const res = await fetch(apiPage)
                    const data = await res.json()
                    if (data['movie']['type']==type) {
                        listTypeSlugs.push(listSlugs[i])
                    }
            } catch (error) {
                
            }    
        }
    }else{
        for (let i = 0; i < 100; i++) {
            const apiPage = `https://ophim1.com/phim/${listSlugs[i]}`;
            try {
                    const res = await fetch(apiPage)
                    const data = await res.json()
                    const typesOfMovie = data['movie']['category']
                    if (typesOfMovie) {
                        const check = typesOfMovie.find(typeMovie => typeMovie['name']==type)
                        if (check) {
                            listTypeSlugs.push(listSlugs[i])
                        }
            
                    }
            } catch (error) {
                
            }    
        }
    }

    return listTypeSlugs
}
let page =1
function renderToBox(list){
    for (let i = 0; i < list.length; i++) {
        if (i >= (page-1)*8 && i < page*8) {
        const api =`https://ophim1.com/phim/${list[i]}`
        fetch(api)
            .then(res => res.json())
            .then(data => {
                const movieInfo = data['movie']
                        console.log(movieInfo['name']);
                        const elm =`    
                        <div
                        class="parent transform hover:scale-105 transition-all duration-500 movie-preview w-1/2 my-4 px-2 relative h-64 md:w-1/4 md:h-48">
                        <img class="w-full h-full"
                            src="${movieInfo['poster_url'] || `${window.location.origin}/asset/img/back-gr-login.jpg`}"
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
                        <div class="absolute top-1/2 transform -translate-y-1/2 pl-2 left-4 text-white">
                            <h2 class="h-6">${movieInfo['name']}</h2>
                            <h4>${movieInfo['time']}</h4>
                            <a href='./movie_detail/${movieInfo['slug']}' class="btn-primary mt-4">
                                <span class="block mr-2">
                                    <i class="fa-solid fa-play"></i>
                                </span>
                                Play now
                            </a>
                        </div>
    
                    </div>
                        `
                        $('#box').append(elm);
        })
        }
    }
}

function renderType(type){
    const call = getListSlug(type)
    call
     .then(data => renderToBox(data))
    
    function load() {
        page++
        call
            .then(data => renderToBox(data))
    }
    loadMore.addEventListener('click', ()=>load())
}