let btnSidebarOpen = document.getElementById('dropdownToggleOpen');
let btnSidebarClose = document.getElementById('dropdownToggleClose');
let btnCloseArea = document.getElementById('closeArea')

let contentSidebar = document.getElementById('dropdownContent');
let contentAreaClose = document.getElementById('closeArea')

btnSidebarOpen.onclick=function(){
    console.log('openSidebar')
    contentSidebar.classList.replace("Sidebar", "offSidebar")
    contentSidebar.classList.replace("offSidebar", "activeSidebar")

    contentAreaClose.classList.replace("Area", "offArea")
    contentAreaClose.classList.replace("offArea", "activeArea")
}
btnSidebarClose.onclick=function(){
    console.log('closeSidebar')
    contentSidebar.classList.replace("activeSidebar", "offSidebar")
    contentAreaClose.classList.replace("activeArea", "offArea")
}

btnCloseArea.onclick=function(){
    console.log("closeAreaSidebar")
    contentSidebar.classList.replace("activeSidebar", "offSidebar")
    contentAreaClose.classList.replace("activeArea", "offArea")
}


let btnProfileOpen = document.getElementById('btnProfileOpen')
let btnProfileClose = document.getElementById('btnProfileClose')
let contentProfilebar = document.getElementById('dropdownProfileContent')

// console.log(btnProfileClose)
// console.log(btnProfileOpen)

btnProfileOpen.onclick=function(){
    contentProfilebar.classList.replace("Profilebar", "offProfilebar")
    contentProfilebar.classList.replace("offProfilebar", "activeProfilebar")
}

btnProfileClose.onclick=function(){
    contentProfilebar.classList.replace("activeProfilebar", "offProfilebar")

}


// btnProfileOpen.onclick=function(){
//     console.log("openProfile")
//     console.log(openProfile)
//     document.getElementById('btnProfileOpen').setAttribute('id', 'btnProfileClose');
//     contentProfilebar.classList.replace("Profilebar", "offProfilebar")
//     contentProfilebar.classList.replace("offProfilebar", "activeProfilebar")
    
//     let btnProfileClose = document.getElementById('btnProfileClose')

//     btnProfileClose.onclick=function(){
//         if (openProfile==0){
//             console.log("closeProfile")
//             contentProfilebar.classList.replace("activeProfilebar", "offProfilebar")
//             openProfile++
//             console.log(openProfile)
//             document.getElementById('btnProfileClose').id=('btnProfileOpen')
//         } else {
//             console.log("false")
//             document.getElementById('btnProfileClose').id=('id', 'btnProfileOpen')
//         }
//     }
// }
