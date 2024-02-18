function seeDetails(a) {
   if(document.getElementById(a).style.display=='block') {
    document.getElementById(a).style.display='none';
   }
    else{
    document.getElementById(a).style.display='block';
    // document.getElementById(a).style.transform=''
   }
}

function english() {
   document.getElementById('title').style.fontFamily="Georgia, 'Times New Roman', Times, serif";
}
function hindi() {
   document.getElementById('title').style.fontFamily="'Courier New', Courier, monospace";
}

function more() {
   document.getElementById('details').style.display='block';
}

// function openbutton() {
//     document.getElementsByClassName("para").style.display='block';
// }
// function openbutton() {
//     document.getElementsByClassName("para").style.display='none';
// }
