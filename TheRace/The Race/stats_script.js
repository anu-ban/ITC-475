function loadData(){
    const storage=JSON.parse(localStorage.getItem("data"))
    const table_body=document.getElementById("table_body")
    table_body.innerHTML=``

    storage.map((item)=>{
        if(item){
            const tr=document.createElement("tr")
const td=`<td>${item.racer1}</td><td>${item.racer2}</td>
<td>${item.winner}</td>
<td>${parseFloat( item.finishTime/10)}seconds</td>
<td>${new Date(item.timestamps).toISOString().split('T')[0]}</td>
            

         


`
tr.innerHTML=td
table_body.appendChild(tr)
        }
    })
}
function search(){
    const racer1=document.getElementById("racer1").value
    const racer2=document.getElementById("racer2").value
    const storage=JSON.parse(localStorage.getItem("data"))
    const table_body=document.getElementById("table_body")
    if(racer1 =="" || racer2 ==""){
        loadData()
        return
    }
table_body.innerHTML=``
    storage.map((item)=>{
        if(item){

            if((racer1 == item.racer1 && racer2 ==item.racer2) || (racer1 === item.racer2 && racer2 ===item.racer1)){

                const tr=document.createElement("tr")
                const td=`<td>${item.racer1}</td><td>${item.racer2}</td>
                <td>${item.winner}</td>
                <td>${parseFloat( item.finishTime/10)}seconds</td>
                <td>${new Date(item.timestamps).toISOString().split('T')[0]}</td>
                            
                
                         
                
                
                `
                tr.innerHTML=td
                table_body.appendChild(tr)

            }
 
        }
    })


}