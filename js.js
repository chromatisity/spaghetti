window.onload = function()
{
    var canvas= document.getElementById("canvas");
    var context = canvas.getContext("2d");
    
    var width=window.innerWidth;
    var height=window.innerHeight;
    
    canvas.width=width;
    canvas.height=height;
    
    var snowFlakesCount=50;
    var particles=[];
    
    for (i = 0; i < snowFlakesCount; i++) {
        particles.push({
        x:Math.random()*width ,
        y:Math.random()*height ,
        r:Math.random()*5+1,
        d:Math.random()*snowFlakesCount
    });
    }
    function draw()
   {
        context.clearRect(0,0,width,height);
        context.fillStyle="rgba(240,240,240,0.8)";
        context.beginPath();
        
        for (i = 0; i < snowFlakesCount; i++) {
            var p =particles[i];
            context.moveTo(p.x,p.y);
            context.arc(p.x,p.y,p.r,0,Math.PI * 2,true);
        }
        
        context.fill();
        update();
   }
    function update()
    {
        for (i = 0; i < snowFlakesCount; i++) {
            var p=particles[i];
            p.y +=3;
            p.x +=1;
            
            if ( p.y>height) {
                particles[i].y = 0;
            }
            if (p.x > width) {
                particles[i].x=0;
            }
        }
    }
    setInterval(draw,20);
};

