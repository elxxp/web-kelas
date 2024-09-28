let btnSidebarOpen = document.getElementById('dropdownToggleOpen');
let btnSidebarClose = document.getElementById('dropdownToggleClose');
let btnCloseArea = document.getElementById('closeArea')

let contentSidebar = document.getElementById('dropdownContent');
let contentAreaClose = document.getElementById('closeArea')

console.log(contentAreaClose)

btnSidebarOpen.onclick=function(){
    console.log('openButton')
    contentSidebar.classList.replace("Sidebar", "offSidebar")
    contentSidebar.classList.replace("offSidebar", "activeSidebar")

    contentAreaClose.classList.replace("Area", "offArea")
    contentAreaClose.classList.replace("offArea", "activeArea")
}
btnSidebarClose.onclick=function(){
    console.log('closeButton')
    contentSidebar.classList.replace("activeSidebar", "offSidebar")
    contentAreaClose.classList.replace("activeArea", "offArea")
}

btnCloseArea.onclick=function(){
    console.log("closeArea")
    contentSidebar.classList.replace("activeSidebar", "offSidebar")
    contentAreaClose.classList.replace("activeArea", "offArea")
}