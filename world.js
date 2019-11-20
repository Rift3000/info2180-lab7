
function cSearch(){
    var check = document.getElementById("country").value;
    var request = new XMLHttpRequest();
    request.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200)
        {
            document.getElementById("result").innerHTML = this.responseText;
            console.log(this.responseText.replace(/<\/?[^>]+(>|$)/g, " ")); 
        }
        
    };
    
    if (document.getElementById('allCheck').checked)
    {
        var url = "world.php?all=true";
    }
    else
    {
        var url = "world.php?country="+check;
    };
    
    
    request.open("GET",url,true);
    request.send("");
}