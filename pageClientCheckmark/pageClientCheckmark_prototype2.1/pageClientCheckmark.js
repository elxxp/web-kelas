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

btnProfileOpen.onclick=function(){
    contentProfilebar.classList.replace("Profilebar", "offProfilebar")
    contentProfilebar.classList.replace("offProfilebar", "activeProfilebar")
}

btnProfileClose.onclick=function(){
    contentProfilebar.classList.replace("activeProfilebar", "offProfilebar")

}



let btnLogout = document.getElementById('btnLogout')

btnLogout.onclick=function(){
    window.location.replace("#logout");
}