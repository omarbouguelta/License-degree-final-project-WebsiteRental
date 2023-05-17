
import chatBotService from "./chatbotservice.js";
const chatBody = document.querySelector(".chat-body");
const txtInput = document.querySelector("#txtInput");
const send = document.querySelector(".send");
const loadingElement=document.querySelector('.loading');
const chatHeader = document.querySelector('.chat-header');
const container = document.querySelector('.container')

window.addEventListener('load', () => {
  container.classList.add('collapsed');
});

chatHeader.addEventListener('click', () => {
  container.classList.toggle('collapsed');
});


send.addEventListener("click", () => renderUserMessage());

txtInput.addEventListener("keyup", (event) => {
  if (event.keyCode === 13) {
    renderUserMessage();
  }
});

chatHeader.addEventListener("click",()=>{
      container.classList.toggle(".collapse");
});

const renderUserMessage = () => {
  var userInput = txtInput.value;
  userInput = removeExtraSpaces(userInput);

  // Check if user input is empty
  if (!userInput) {
    renderMessageEle("Is there anything I can help with?", "chatbot");
    return;
  }

  renderMessageEle(userInput, "user");
  txtInput.value = "";
  toggleloading(false);
  renderChatbotResponse(userInput);
 
};

const renderChatbotResponse = (userInput) => {
  const res = getChatbotResponse(userInput);
  if (userInput.toLowerCase() === "tutorial") {
    setTimeout(() => {
      window.location.href = "tutorial.html";
    }, 3000);
    
  }
};

const renderMessageEle = (txt, type) => {
  let className = "user-message";
  if (type !== "user") {
    className = "chatbot-message";
  }
  const messageEle = document.createElement("div");
  const txtNode = document.createTextNode(txt);
  messageEle.classList.add(className);
  messageEle.append(txtNode);
  chatBody.append(messageEle);
};

const getChatbotResponse = (userInput) => {
            chatBotService.getBotResponse(userInput)
            .then((response)=>{
              if (response === undefined) {
                renderMessageEle("Sorry, I can't understand you", "chatbot");
              } else {
                renderMessageEle(response, "chatbot");
              }
              setScrollPosition();
              toggleloading(true);
             
            })
     
          .catch((error) =>{
            toggleloading(true);
          });
};

const setScrollPosition = () => {
  if (chatBody.scrollHeight > 0) {
    chatBody.scrollTop = chatBody.scrollHeight;
  }
};


const toggleloading=(show)=>loadingElement.classList.toggle("hide",show)


function removeExtraSpaces(userInput) {

  return userInput.charAt(0).toUpperCase() + userInput.slice(1).toLowerCase().replace(/\s+/g, ' ');
}