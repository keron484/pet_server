<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    body{
        padding: 0;
        margin: 0;
        font-family: "Poppins", sans-serif;
    }
    .container{
        height: 100dvh;
        width: 100dvw;
        background-color: #f9f9f9;
        display: flex;
        flex-direction: row;
        place-items: center;
        justify-content: center;
        align-items: center;
    }
    .message-box{
        width: 85%;
        border-radius: 20px;
        background-color: #fff;
        height: auto;
        max-height: 100dvh;
        box-sizing: border-box;
        padding: 10px;
    }
    .logo{
        width: 100px;
        height: 70px;
    }
    .logo-box{
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        margin-top: 2rem;
    }
    h1{
        font-size: 1.5rem;
        font-weight: 900;
        text-align: center;
    }
    .title-box{
        flex-direction: row;
        display: flex;
        align-items: center;
    }
    p{
        font-size: 1.2rem;
    }
    .w-100{
        border-bottom: .5px solid #ccc;
        width: 100%;
        padding-bottom: 1rem;
    }
    .user-text{
        font-size: 1.1rem;
        font-weight: 900;
    }
    .mdi--hand-wave {
        display: inline-block;
        width: 1em;
        height: 1em;
        --svg: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23000' d='M23 17c0 3.31-2.69 6-6 6v-1.5c2.5 0 4.5-2 4.5-4.5zM1 7c0-3.31 2.69-6 6-6v1.5c-2.5 0-4.5 2-4.5 4.5zm7-2.68l-4.59 4.6c-3.22 3.22-3.22 8.45 0 11.67s8.45 3.22 11.67 0l7.07-7.09c.49-.47.49-1.26 0-1.75a1.25 1.25 0 0 0-1.77 0l-4.42 4.42l-.71-.71l6.54-6.54c.49-.49.49-1.28 0-1.77s-1.29-.49-1.79 0L14.19 13l-.69-.73l6.87-6.89c.49-.49.49-1.28 0-1.77s-1.28-.49-1.77 0l-6.89 6.89l-.71-.7l5.5-5.48c.5-.49.5-1.28 0-1.77s-1.28-.49-1.77 0l-7.62 7.62a4 4 0 0 1-.33 5.28l-.71-.71a3 3 0 0 0 0-4.24l-.35-.35l4.07-4.07c.49-.49.49-1.28 0-1.77c-.5-.48-1.29-.48-1.79.01'/%3E%3C/svg%3E");
        background-color: orange;
        -webkit-mask-image: var(--svg);
        mask-image: var(--svg);
        -webkit-mask-repeat: no-repeat;
        mask-repeat: no-repeat;
        -webkit-mask-size: 100% 100%;
        mask-size: 100% 100%;
      }
      .btn-success{
        width: 90%;
        border-radius: 5px;
        padding: 0.8rem;
        margin-top: 0.6rem;
        border: none;
        font-size: 15px;
        font-weight: 500;
        background-color: steelblue;
        color: #fafafa;
      }
      .text-center{
        flex-direction: row;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 10px;
        margin-top: 1.5rem;
      }
      .word-center{
        text-align: center;
        font-size: 10px;
      }
      .d-block{
        display: block;
      }
    
    </style>
    <body>
        <body>
            <div class="container">
             <div class="message-box">
                <h1>Welcome to Your New Pet Adventure! 🐾</h1>
                <div class="message-body">
                  <p>
             Welcome to the Family, {{ $name }}! 🐾

     <p>
        Dear {{ $name }},
     </p>

Welcome to Pethaven!

  <p>
    We’re overjoyed that you’ve joined our community of pet lovers and advocates! Whether you’re looking to adopt a furry friend or simply exploring the joy of pet companionship, you’ve come to the right place.

  Here’s what you can expect as you embark on this heartwarming journey:
  </p>

  <p>
    🐶 **Meet Your Perfect Match**: Browse our diverse selection of adorable pets looking for forever homes. Each one has a unique story to tell, and we can't wait for you to find your new best friend.

    💙 **Community Support**: Connect with fellow pet lovers, share your adoption journey, and get advice from other pet parents who are just as passionate as you are.

    🎉 **Resources & Tips**: Access expert advice on pet care, training, and integrating your new friend into your home.

  </p>
   <p>
    If you have any questions or need assistance, our dedicated team is here to help you find your perfect match. Just hit reply to this email, and we’ll be more than happy to assist!

Thank you for being a part of our mission to give every pet the loving home they deserve. Together, we can make a difference!

Warm snuggles,  
The Pethaven Team

P.S. Keep an eye on your inbox for profiles of pets available for adoption and tips on how to prepare for your new companion! 🐾💖
                  </p>
                </div>
                <div class="text-center">
                    <div class="d-block">
                        <p class="word-center">@2024 pethaven. All rights Reserved</p>
                    <p class="word-center">pethaven.com</p>
                    </div>
                </div>
             </div>
            </div>
        </body>
    </body>