function roleChanged(option){
  if (option.value == "passenger"){
    document.getElementById("brand_name").style.display = "none";
  } else{
    document.getElementById("brand_name").style.display = "";
  }
  if (option.value == "passenger"){
    document.getElementById("patent").style.display = "none";
  } else{
    document.getElementById("patent").style.display = "";
  }
  if (option.value == "passenger"){
    document.getElementById("work_from_hour").style.display = "none";
  } else{
    document.getElementById("work_from_hour").style.display = "";
  }
  if (option.value == "passenger"){
    document.getElementById("work_to_hour").style.display = "none";
  } else{
    document.getElementById("work_to_hour").style.display = "";
  }
}
