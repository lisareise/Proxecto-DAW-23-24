var ctx= document.getElementById("myChart").getContext("2d");
const myChart = new Chart(ctx,{
    type:"line",
    data:{
        labels:['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
        datasets:[{
            label:'Evolución de peso',
            data: [56.4,56.0,56.2,55.8,54.5,54.0,53.4,53.0,53.0,52.2,51.7,50.0]
        }]
    }
})