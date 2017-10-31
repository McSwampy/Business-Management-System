function closeWindow(item, parent = false){
  if(parent != false){
    hideItem(item.parentNode.parentNode);
  }else{
    if(isElement(item)){
      hideItem(item);
    } else {
      var selected = get(item);
      hideItem(selected);
    }
  }
}

function get(id){
  return document.getElementById(id);
}

function hideItem(item, time = 300){
  item.style.opacity = 0;
  setTimeout(displayNone, time, item);
}
function displayNone(item){
  item.style.display = "none";
}


function isElement(o){
  return (
    typeof HTMLElement === "object" ? o instanceof HTMLElement : //DOM2
    o && typeof o === "object" && o !== null && o.nodeType === 1 && typeof o.nodeName==="string"
  );
}
