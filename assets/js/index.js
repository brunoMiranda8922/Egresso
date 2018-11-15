$(function() {
  
  
  var g1 = new JustGage({
      id: "gauge1",
      value: 10,
      min: 0,
      max: 30,
      title: "Holidays",
	  label: 'Frequencia'
    });
  var g2 = new JustGage({
    id: "gauge2",
    value: 8,
    min: 0,
    max: 10,
    title: "Shifts",
    label: 'Frequencia no mês'
    
  });    
  
  $( window ).resize(function() {
    $('#gauge1')[0].innerHTML = '';
    $('#gauge2')[0].innerHTML = '';
    var g1 = new JustGage({
      id: "gauge1",
      value: 30,
      min: 0,
      max: 30,
      title: "",
	  label: 'Frequencia'
    });
  var g2 = new JustGage({
    id: "gauge2",
    value: 8.1,
    min: 0,
    max: 10,
    title: "",
    label: 'PR'
    
  }); 
  });
  
});