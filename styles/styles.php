@import url("https://fonts.googleapis.com/css2?family=Parkinsans:wght@300..800&display=swap");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Parkinsans", sans-serif;
  font-optical-sizing: auto;
  text-decoration: none;
  list-style-type: none;
  outline: none;

  a {
    color: #000;
  }
}

body {
  background-color: #425dd8;
  min-height: calc(100vh - 260px);
}

body > section {
  min-height: calc(100vh - 260px);
}

h1,
h2,
h3 {
  color: #fff;
}

.page-in-information-state {
  margin: 50px auto;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  gap: 20px;
  border-radius: 20px;
  padding: 50px;
  min-width: 300px;
  max-width: fit-content;
  background-color: #e2e2e2;

  * {
    color: #000;
  }
}
.navbar-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-direction: row;
  height: 60px;
  background-color: #fff;
  padding: 0 30px;
}

.navbar {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: row;

  ul {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: row;
    gap: 20px;
  }

  a {
    color: black;
  }
}

.navbar-container a {
  text-decoration: none;
}
.footer-section {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 50px;
  padding: 30px 50px;
  height: 200px;
  background-color: #151e46;
  color: #fff;

  a {
    color: #eee;
  }
}

.page-links,
.social-media {
  h3 {
    text-align: center;
    margin: 10px auto 20px;
  }

  ul {
    display: grid;
    justify-items: flex-start;
    align-content: flex-start;
  }
}

.page-links {
  position: relative;
  ul {
    grid-template-columns: repeat(1, 1fr);
  }
}

.page-links::before,
.page-links::after {
  content: "";
  position: absolute;
  background-color: white;
}
.page-links::before {
  top: 0;
  right: -23px;
  height: 100%;
  width: 3px;
}
.page-links::after {
  transform: translateY(-50%);
  top: 50%;
  right: -31px;
  height: 3px;
  width: 20px;
}

.social-media {
  ul {
    grid-template-columns: repeat(2, 1fr);
    justify-items: center;
  }
}
.post-page {
  margin: 0 auto;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  gap: 20px;

  .title {
    margin: 50px auto 10px;
  }
}
.form {
  margin: 40px auto;
  padding: 20px 40px;
  border-radius: 25px;
  max-height: max-content;
  max-width: max-content;
  min-height: 300px;
  min-width: 500px;
  background-color: #dadada;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  gap: 15px;

  h1,
  h2 {
    color: #333;
    margin: 20px 0 10px;
  }

  input {
    display: inline-block;
    width: 100%;
    min-height: 3em;
    padding: 10px 20px;
    border-radius: 10px;
    background-color: #fff;
    border: none;
  }

  input#title {
    font-weight: 500;
  }

  textarea {
    background-color: #fff;
    border-radius: 15px;
    border: none;
    resize: none;
    padding: 10px 20px;
    font-size: 12px;
    line-height: 18px;
    width: 100%;
  }

  button {
    border: 2px solid #000;
    background-color: #fff;
    height: 3em;
    width: max-content;
    margin: 5px 0 5px auto;
    border: none;
    padding: 10px 50px;
    font-weight: 600;
    font-size: 20px;
    display: block;
    letter-spacing: 1px;
    border-radius: 10px;
    transition: 300ms;
  }
  button:hover {
    padding: 10px 80px;
  }

  p {
    margin: 20px 0 0;
    font-size: 12px;
  }

  .form-helper-buttons {
    margin: -10px 0 20px;
    width: 100%;
    text-align: left;
  }

  hr {
    width: 80%;
    height: 2px;
    background-color: #fff;
    margin: 15px auto;
  }
}

.new-pool-form {
  .vote-field {
    width: 100%;
    display: grid;
    grid-template-columns: 80px auto;
    justify-items: center;
    align-content: center;
    gap: 30px;

    input[type="file"] {
      display: block;
      font-size: 10px;
      margin: 0 auto;
      height: 100%;
      width: 100%;
    }
  }
}

@keyframes buttonAnimation {
  35% {
    transform: translateX(0px);
  }
  40% {
    transform: translateX(5px);
  }
  45% {
    transform: translateX(-5px);
  }
  50% {
    transform: translateX(5px);
  }
  55% {
    transform: translateX(-5px);
  }
  60% {
    transform: translateX(5px);
  }
  65% {
    transform: translateX(0px);
  }
}
.about-page {
  background-color: #555;
  padding: 50px;
  margin: 50px 200px;

  h1 {
    color: #eee;
  }

  .info {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    padding: 0 0 30px;
    justify-items: center;
    align-content: center;
    width: 100%;
    height: 100%;
    margin: 30px 0;
    gap: 50px;
  }

  p {
    margin: 50px 0 0;
    text-wrap: wrap;
    max-width: 500px;
    line-height: 2em;
  }

  img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    margin-top: 50px;
    border: 2px solid white;
  }

  .accent {
    color: greenyellow;
    font-weight: bold;
  }
}
.logout-page {
  margin: 0 auto;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  gap: 50px;
}
.profile-page {
  margin: 0 auto;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  gap: 20px;
}