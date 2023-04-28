let deadline;

function setCookie() {
  // create deadline 10 minutes from now
  const timeInMinutes = 55;
  const currentTime = Date.parse(new Date());
  deadline = new Date(currentTime + timeInMinutes * 60 * 1000);

  // store deadline in cookie for future reference
  document.cookie = "myClock=" + deadline + "; path=/; domain=.berenherbal.com";
}
// if there's a cookie with the name myClock, use that value as the deadline
if (document.cookie && document.cookie.match("myClock")) {
  // get deadline value from cookie
  deadline = document.cookie.match(/(^|;) myClock=([^;]+)/)[2];
  distance = new Date(deadline).getTime() - new Date().getTime(); //now.addMinutes(5).getTime() - now.getTime();
  if (distance < 0) {
    setCookie();
  }
} else {
  // otherwise, set a deadline 10 minutes from now and
  // save it in a cookie with that name

  setCookie();
}

console.log("Hello");

var timeinterval = 0;
function getTimeRemaining(endtime) {
  const total = Date.parse(endtime) - Date.parse(new Date());
  const seconds = Math.floor((total / 1000) % 60);
  const minutes = Math.floor((total / 1000 / 60) % 60);
  const hours = Math.floor((total / (1000 * 60 * 60)) % 24);
  const days = Math.floor(total / (1000 * 60 * 60 * 24));

  return {
    total,
    days,
    hours,
    minutes,
    seconds,
  };
}

function initializeClock(id, endtime) {
  /*
  const clock = document.getElementById(id);
  const daysSpan = clock.querySelector('.days');
  const hoursSpan = clock.querySelector('.hours');
  const minutesSpan = clock.querySelector('.minutes');
  const secondsSpan = clock.querySelector('.seconds');
*/
  function updateClock() {
    const t = getTimeRemaining(endtime);

    /*
    daysSpan.innerHTML = t.days;
    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);
	*/
    document.querySelectorAll(".days").forEach((span) => {
      span.innerText = t.days;
    });
    document.querySelectorAll(".hours").forEach((span) => {
      span.innerText = ("0" + t.hours).slice(-2);
    });
    document.querySelectorAll(".minutes").forEach((span) => {
      span.innerText = ("0" + t.minutes).slice(-2);
    });
    document.querySelectorAll(".seconds").forEach((span) => {
      span.innerText = ("0" + t.seconds).slice(-2);
    });

    if (t.total <= 0) {
      clearInterval(timeinterval);
      deadline = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000);
    }
  }

  updateClock();
  const timeinterval = setInterval(updateClock, 1000);
}

//const deadline = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000);
initializeClock("clockdiv", deadline);


/* ===[Start Toggle Campaign Timer]=== */
let openCampaignTimerBtn = document.querySelector('.toggle-campaign-timer');
let closeCampaignTimerBtn = document.querySelector('.hide-campaign-timer');

function openCampaignTimer() {
    this.closest('.campaign-timer').classList.add('timer-visible');
};

function closeCampaignTimer() {
    console.log(this.closest('.campaign-timer'));
    this.closest('.campaign-timer').classList.remove('timer-visible');
}

if (openCampaignTimerBtn !== null) {
    openCampaignTimerBtn.addEventListener('click', openCampaignTimer);
}

if (closeCampaignTimerBtn !== null) {
    closeCampaignTimerBtn.addEventListener('click', closeCampaignTimer);
}
/* ===[End Toggle Campaign Timer]=== */
 