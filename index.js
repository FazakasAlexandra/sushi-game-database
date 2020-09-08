let player = {
  Name: 'BOBO',
  Level: 109,
  Sushi: 44
}

let name = 'Charles'

function getPlayers(){
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState === 4 && this.status === 200) {
        let parsed = JSON.parse(this.response)
        console.log(parsed)
        console.log(parsed[0].Name)
      }
    };
  
  xhttp.open("GET", "http://localhost/players/db/get-players.php", true);
  xhttp.send();
}

function getPlayer(){
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState === 4 && this.status === 200) {
        console.log('send')
        console.log(this.responseText)
      }
    };
  
  xhttp.open("GET", `http://localhost/players/db/get-player.php?Name=${name}`, true);
  xhttp.send();
}

function postPlayer(){
  const JSONplayer = JSON.stringify(player)
  const xhttp = new XMLHttpRequest()
  xhttp.onreadystatechange = function(){
    if(this.readyState === 4 && this.status === 200){
      console.log(this.response)
    }
  }
  xhttp.open('POST','http://localhost/players/db/post-player.php')
  xhttp.setRequestHeader('Content-Type', 'application/json')
  xhttp.send(JSONplayer)
}

function upadatePlayerSushi(){
  let xhttp = new XMLHttpRequest()
  xhttp.onreadystatechange = function(){
    if(this.readyState === 4 && this.status === 200){
      console.log(this.response)
    }
  }

  xhttp.open("PUT", `http://localhost/players/db/update_player_sushi.php?Name=Charles&Sushi=999`)
  xhttp.send();
}

function upadatePlayerLevel(){
  let xhttp = new XMLHttpRequest()
  xhttp.onreadystatechange = function(){
    if(this.readyState === 4 && this.status === 200){
      console.log(this.response)
    }
  }

  xhttp.open("PUT", `http://localhost/players/db/update_player_level.php?Name=Charles&Level=99`)
  xhttp.send();
}

//postPlayer()
//getPlayers()
//getPlayer()
//upadatePlayerSushi()
//upadatePlayerLevel()
