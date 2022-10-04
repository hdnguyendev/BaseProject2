
        function loadEp(linkEmbed){
            $('#video-player').attr('src', linkEmbed)
            window.scrollTo(0, 0)
        }
        function render(URL, ...args){
        fetch(URL)
                .then(res => res.json())
                .then(data =>{
                    const movieInfo = data['movie']
                
                    const elm =`
                    <!-- main movie frame -->
                    <div class="p-20 mt-10 min-w-min flex justify-center items-center">
                       <iframe id="video-player" class="w-full" src="${data['episodes'][0].server_data[0]['link_embed']}" frameborder="0" width="900" height="600"></iframe>
                    </div>

                    <!-- description of movie -->
                    <div class="flex flex-col lg:flex-row px-20 text-white text-lg justify-between">
                        <div class="flex flex-col w-full lg:w-1/3">
                            <div class="flex justify-between items-center flex-wrap py-4">
                                <h1 class="text-4xl font-semibold">${movieInfo['name']} <span class="text-2xl text-red-600 font-normal">${movieInfo['lang']}</span></h1>
                                
                                
                            </div>
                            <h3 class="text-red-600 text-2xl pb-2">Adventure</h3>
                            <div class="flex items-center py-4">
                                <div class="mr-2 w-8 h-8 leading-8 bg-gray-500 text-white text-center font-bold">GP</div>
                                <p><span>${movieInfo['time']}</span> <i class="fa-solid fa-circle"></i>${movieInfo['showtimes']}</p>
                            </div>
                            <div class="w-4/5 flex-row justify-around flex">
                                <div class="circle-action relative">
                                    <i class="fa-solid fa-share-nodes"></i>
                                    <div
                                        class="ml-1 absolute left-full hidden justify-center top-1/2 transform -translate-y-1/2 h-8 bg-black items-center">
                                        <a href="" class="p-2 text-hover pl-3"><i class="fa-brands fa-twitter"></i></a>
                                        <a href="" class="p-2 text-hover pr-3"><i class="fa-brands fa-twitter"></i></a>
                                        <a href="" class="p-2 text-hover pr-3"><i class="fa-brands fa-twitter"></i></a>

                                    </div>
                                </div>
                                <div class="circle-action relative">
                                    <i class="fa-solid fa-heart"></i>
                                    <div
                                        class="ml-1 absolute left-full hidden justify-center top-1/2 transform -translate-y-1/2 h-8 bg-black items-center">
                                        <a href="" class="p-2 text-hover pl-3"><i class="fa-brands fa-twitter"></i></a>

                                    </div>
                                </div>
                                <div class="circle-action relative">
                                    <i class="fa-solid fa-add"></i>
                                    <div
                                        class="ml-1 absolute left-full hidden justify-center top-1/2 transform -translate-y-1/2 h-8 bg-black items-center">
                                        <a href="" class="p-2 text-hover pl-3"><i class="fa-brands fa-twitter"></i></a>

                                    </div>
                                </div>

                            </div>
                            <div class="flex justify-start items-center py-4">
                                <h2 class="text-red-600 text-xl mr-2"><i class="fa-solid fa-tags"></i> Tags:</h2>
                                
                                <p>
                                    ${movieInfo['category'].map(act => {
                                                        console.log(act);
                                                        return `<span><a href="">${act['name']}</a></span>`
                                    }).join(', ')}
                                
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col  w-full lg:w-1/2">
                                <div class="flex justify-start my-2">
                                    <h2 class="text-red-600 mr-2 w-24  min-w-min">Description: </h2>
                                    <div >
                                        ${movieInfo['content']}
                                    </div>
                                </div>
                                <div class="flex justify-start my-2 w-full">
                                    <h2 class="text-red-600 mr-2 w-24">Actors: </h2>
                                <div class="w-4/5">

                                    <p class="">
                                        ${movieInfo['actor'].map(act => {
                                                        return `<span><a href="">${act}</a></span>`
                                                    }).join(', ')}
                                    
                                    </p>
                                </div>
                                </div>
                                <div class="flex justify-start my-2">
                                    <h2 class="text-red-600 mr-2 w-24 min-w-min">Country: </h2>
                                    <p>
                                        ${movieInfo['country'].map(crt => {
                                                        
                                                        return crt['name']
                                                    })}
                                    </p>
                                </div>

                        </div>
                    </div>
                    `

                    $('#movie').append(elm)
                    if (data['episodes'][0].server_data.length > 1) {
                        const listEp = data['episodes'][0].server_data
                        listEp.forEach(ep => {
                            $('#ep-movies').append(`<span class="bg-red-600 m-1 select-none cursor-pointer w-12 h-6 font-bold text-center rounded-md leading-6 hover:opacity-70" onclick="loadEp('${ep.link_embed}')">${ep.name}</span>`)
                        });
                    }else{
                        $('#ep-movies').append(`<span class="bg-red-600 m-1 select-none cursor-pointer w-12 h-6 font-bold text-center rounded-md leading-6 hover:opacity-70" onclick="loadEp('${data['episodes'][0].server_data[0]['link_embed']}')">Full</span>`)
                    }

                })
        } 