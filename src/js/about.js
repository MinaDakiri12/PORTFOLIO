//* ***********  DOM  Start ***********

const profile = document.querySelector('.profile')
const skills = document.querySelector('.skills')
const aboutBtn = document.querySelector('.profile__aboutBtn')
const skillsBtn = document.querySelector('.profile__skillsBtn')

//* *********** DOM END ***********

//* *********** EVENTS ***********

if(aboutBtn !== null)
aboutBtn.addEventListener('click',Profile);

if(skillsBtn !== null)
skillsBtn.addEventListener('click',Skills);

function Profile(){
    profile.style.display = 'grid'
    skills.style.display ='none'
    skillsBtn.classList.remove('activeBtn')
    aboutBtn.classList.add('activeBtn')
}

function Skills(){
    profile.style.display = 'none'
    skills.style.display ='grid'
    skillsBtn.classList.add('activeBtn')
    aboutBtn.classList.remove('activeBtn')
}

