let btnSidebarOpen = document.getElementById('dropdownToggleOpen');
let btnSidebarClose = document.getElementById('dropdownToggleClose');

let contentSidebar = document.getElementById('dropdownContent');


btnSidebarOpen.onclick=function(){
    console.log('openButton')
    contentSidebar.classList.replace("Sidebar", "offSidebar")
    contentSidebar.classList.replace("offSidebar", "activeSidebar")
}
btnSidebarClose.onclick=function(){
    console.log('closeButton')
    contentSidebar.classList.replace("activeSidebar", "offSidebar")
}