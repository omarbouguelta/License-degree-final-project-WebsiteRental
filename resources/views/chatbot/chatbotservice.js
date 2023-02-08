const responseObj = {
  "website": "it's a vacation rental website , i can give you a tour if you write the word tutorial",
  hello: "Hey ! How are you doing ?",
  hey: "Hey! What's up?",
  "nothing": "ok",
  hi: "Hey!",
  howdy: "Hello there!",
  "what's up": "Not much, just chatting with you!",
  "how are you": "I'm doing great, thanks for asking!",
  "what's new": "Nothing much, just enjoying my day!",
  "how's it going": "It's going well, thanks!",
  "what are you up to": "Just hanging out and answering questions!",
  time: "time is: " + new Date().toLocaleTimeString(),
  "what time is it": new Date().toLocaleTimeString(),
  "tell me a joke": "Why did the tomato turn red? Because it saw the salad dressing!",
  "make me laugh": "Why did the scarecrow win an award? Because he was outstanding in his field!",
  "cheer me up": "Here's a cute animal picture: https://www.google.com/search?q=cute+animal+pictures",
  "what's your favorite food": "As a chatbot, I don't eat food, but if I could I would love to try all kinds of cuisines!",
  "what's your favorite color": "As a chatbot, I don't have personal preferences, but I think blue is a calming color!",
  "what's your favorite movie": "As a chatbot, I don't watch movies, but I can help you find information about popular films!",
  "what's your favorite book": "As a chatbot, I don't have personal preferences, but I can help you find information about popular books!",
  "about you": "Not much, just chatting with you!",
  "and you": "Not much, just chatting with you!",
  "chillin": "ok cool",
  "show me arround": "please write tutorial",
  "are you": "My name is omar, i am a chatbot ready to answer your quetions",
  "fine": "good to hear that",
  "cool": "cool,do not hesitate to ask me",
  "ok": "do not hesitate to ask me",
  "where": "welcome to holiday hub, a place you where you can find your best vacation at the best price",
  "good": "good to hear that",
  "alright": "good to hear that",
  "fabulous": "good to hear that",
  "tutorial": "ok, redirecting you to tutorial",
  "help": "please write tutorial",
  "I am new here": "please write tutorial",
  "can you show me around": "please write tutorial",
};

const fetchResponse = (userInput) => {
  return new Promise((res, reject) => {
      try {
        setTimeout(() => {
            const keys = Object.keys(responseObj);
            let matchingKey = keys.find(key => userInput.toLowerCase().includes(key.toLowerCase()));
            if (!matchingKey) {
                matchingKey = "default";
            }
            if (matchingKey === "tutorial") {
                window.location.href = "tutorial.html";
            } else {
                res(responseObj[matchingKey]);
            }
        }, 1200);
      } catch (error) {
            reject(error);
      }
  });
  };



const levenshteinDistance = (a, b) => {
  const dp = Array(b.length + 1).fill(0).map(() => Array(a.length + 1).fill(0));
  for (let i = 0; i <= a.length; i += 1) {
      dp[0][i] = i;
  }
  for (let j = 0; j <= b.length; j += 1) {
      dp[j][0] = j;
  }
  for (let j = 1; j <= b.length; j += 1) {
      for (let i = 1; i <= a.length; i += 1) {
          if (a[i - 1] === b[j - 1]) {
              dp[j][i] = dp[j - 1][i - 1];
          } else {
              dp[j][i] = 1 + Math.min(dp[j - 1][i - 1], dp[j][i - 1], dp[j - 1][i]);
          }
      }
  }
  return dp[b.length][a.length];
};

const chatBotService = {
  getBotResponse(userInput) {
      return fetchResponse(userInput);
  },
};

export default chatBotService;
