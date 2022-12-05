// 0=tortoise
// 1=rabbit
// 2=dog
// 3=cat
const characters=["tortoise","rabbit","dog","cat"]
let isStart=false
let isRace=false
let RaceParticipants=[]
const choose_racers=document.getElementById("choose_racers")
const race_begin=document.getElementById("race_begin")
const light=document.getElementById("light")
let x=0
let y=0
let seconds=0
let width=window.innerWidth - 100
const racer1=document.getElementById("racer1")
const racer2=document.getElementById("racer2")
const winnerImg=document.getElementById("winnerImg")
const winnerText=document.getElementById("winnerText")
let storage=JSON.parse(localStorage.getItem("data"||[]))

race_begin.style.display="none"

function chooseRacer(index){
    if(RaceParticipants.length>=2){
        alert("You can choose only two")
        return
    }
    RaceParticipants.push(index)
    const selectedRacers=document.querySelectorAll(".racers_image figure")
    RaceParticipants.forEach((value)=>{
        selectedRacers[value].classList.add("selectRacers")
    })
}
function startRace(){
    if(RaceParticipants.length!==2){
        alert("please select two Racers")
        return
    }
    race_begin.style.display="flex"
    choose_racers.style.display="none"
    racer1.setAttribute("src",`./images/${characters[RaceParticipants[0]]}.jfif`)
    racer2.setAttribute("src",`./images/${characters[RaceParticipants[1]]}.jfif`)

    isRace=true

}




function start(){
 width=window.innerWidth - 100

    isStart=true
    if(isStart){
        light.style.backgroundColor="green"
        light.style.boxShadow="0px 0px 10px 10px green"
   Go()
document.getElementById("start").setAttribute("disabled",true)
    }

}
function Go(){
    seconds=0
    x=0
    y=0
  const mInterval=  setInterval(()=>{
        if(isRace && isStart){
            seconds=seconds+1
            const random=parseInt(Math.random()*40)
            const random1=parseInt(Math.random()*random)
            const random2=parseInt(Math.random()*random)

            x=x+random1
            y=y+random2
            if(x < width  && y<width){
                
                try {
               racer1.style.left=`${x}px`
               racer2.style.left=`${y}px`

    
                    
                } catch (error) {
                    console.log(error)
                    
                }
                
            } else{
                isStart=false
                x=x-random1
                y=y-random2
                
            }
    
        }else{
          if(x==y){
            alert("Match Tied")
            Reset()

          }
         else if(x>y){
             storage=JSON.parse(localStorage.getItem("data" || []))
            document.getElementById("winner").style.display="flex"
            winnerImg.setAttribute("src",`./images/${characters[RaceParticipants[0]]}.jfif`)
            winnerText.innerText=`The winner is  ${characters[RaceParticipants[0]]} Finished in ${parseFloat(seconds/10)} seconds.`
            const winner_data={
                racer1:characters[RaceParticipants[0]],
                racer2:characters[RaceParticipants[1]],
                winner:characters[RaceParticipants[0]],
                finishTime:seconds,
                timestamps:new Date(),

            }
            let arr=[]
            if(storage){
                storage.map((item)=>{ 
                    if(item){
                        arr.push(item)
                    }
                })
                
            }

            const mData=[winner_data,...arr]
            
            localStorage.setItem("data",JSON.stringify(mData))
            
          }else if(y>x){
            storage=JSON.parse(localStorage.getItem("data"||[]))
            const winner_data={
                racer1:characters[RaceParticipants[0]],
                racer2:characters[RaceParticipants[1]],
                winner:characters[RaceParticipants[1]],
                finishTime:seconds,
                timestamps:new Date(),

            }
            let arr=[]
            if(storage){
                storage.map((item)=>{ 
                    if(item){
                        arr.push(item)
                    }
                })
                
            }

            const mData=[winner_data,...arr]
            
            localStorage.setItem("data",JSON.stringify(mData))

            document.getElementById("winner").style.display="flex"

            winnerImg.setAttribute("src",`./images/${characters[RaceParticipants[1]]}.jfif`)
            winnerText.innerText=`The winner is  ${characters[RaceParticipants[1]]} Finished in ${parseFloat(seconds/10)} seconds.`
          }
          light.style.backgroundColor="red"
          light.style.boxShadow="0px 0px 10px 10px red"
            clearInterval(mInterval)
        }
    },100)

}

function Reset(){
    racer1.style.left=`${0}px`
    racer2.style.left=`${0}px`
    document.getElementById("start").removeAttribute("disabled")
    light.style.backgroundColor="red"
    light.style.boxShadow="0px 0px 10px 10px red"
    document.getElementById("winner").style.display="none"



}
























