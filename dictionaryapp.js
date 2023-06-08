const resultDiv = document.querySelector(".result");
const wordEle = document.querySelector(".word");
const phonetics = document.querySelector(".phonetics");
const audio = document.querySelector(".audio");
const wordMeaning = document.querySelector(".word-definition");
const synonyms = document.querySelector(".synonyms");
const url = "https://api.dictionaryapi.dev/api/v2/entries/en/"


const handle = async (e) =>{
    if(e.keyCode ==13){
        const word = e.target.value;
     const result = await fetch(url + word);
     if(!result.ok){
          toastr.info("no definition found");
         //alert("no definition found");
         return;
     }
     const data = await result.json();

      resultDiv.style.display = "block";
      wordEle.innerText = data[0].word;
      phonetics.innerText = data[0].phonetics[0].text;
      audio.src = data[0].phonetics[0].audio;
      wordMeaning.innerText = data[0].meanings[0].definitions[0].definition;
      const synonymsArray = data[0].meanings[0].definitions[0].synonyms;
      if(synonymsArray){
        let synonymsData = "";
        for(let i=0; i<synonymsArray.length; i++){
          synonymsData += `<p class="pills">${synonymsArray[i]}</p>`
        }
        synonyms.innerHTML = synonymsData;
      }else{
          synonyms.innerHTML ='<p class="pills">No Synonyms available</p>';
      }
     
    }
};