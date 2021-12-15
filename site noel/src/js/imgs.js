window.addEventListener("DOMContentLoaded", (e) => {
  console.log(e);

  const pola = document.querySelector(".polaroide");

  var Image = [];
  index = 0;
  
  Image[0] = '<img src="./src/img/imagePola1.gif"/>';
  Image[1] = '<img src="https://2.bp.blogspot.com/-s4MMglI-2Og/W56KJVfnSnI/AAAAAAAAAUs/ged7BG1DhgEewFqXWBs-cfHHHU3C40w6gCLcBGAs/s640/New%2BYears%2BEvents%2Bin%2BNew%2BYork.gif"/>';
  Image[2] = '<img src="https://img1.picmix.com/output/pic/normal/4/1/2/0/8180214_5e573.gif"/>';
  Image[3] = '<img src="https://i.pinimg.com/originals/39/69/4e/39694e0a67b31f72a8c25fb4ea24902e.gif"/>';
  Image[4] = '<img src="https://media2.giphy.com/media/5SRPnFvRG918k/200.gif"/>';

  index = Math.floor(Math.random() * Image.length);
  pola.innerHTML = Image[index];

  setInterval(function () {
    index = Math.floor(Math.random() * Image.length);
    pola.innerHTML = Image[index];
  }, 7000);
});


