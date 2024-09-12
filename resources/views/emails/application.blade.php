<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
     crossorigin="anonymous">
     <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <style>
        body{
           font-family: 'poppins', sans-serif;  
        } 
        .main-box{
            height: 100dvh;
            width: 100%;
            background-color: #fbfbab;
        }
        .last-container{
            color: #fbfbab;
        }
        .why-container{
            background-color: #f34040;
            font-size: 0.7rem;
        }
        .clarity--email-solid {
  display: inline-block;
  width: 1em;
  height: 1em;
  --svg: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 36 36'%3E%3Cpath fill='%23000' d='M32.33 6a2 2 0 0 0-.41 0h-28a2 2 0 0 0-.53.08l14.45 14.39Z' class='clr-i-solid clr-i-solid-path-1'/%3E%3Cpath fill='%23000' d='m33.81 7.39l-14.56 14.5a2 2 0 0 1-2.82 0L2 7.5a2 2 0 0 0-.07.5v20a2 2 0 0 0 2 2h28a2 2 0 0 0 2-2V8a2 2 0 0 0-.12-.61M5.3 28H3.91v-1.43l7.27-7.21l1.41 1.41Zm26.61 0h-1.4l-7.29-7.23l1.41-1.41l7.27 7.21Z' class='clr-i-solid clr-i-solid-path-2'/%3E%3Cpath fill='none' d='M0 0h36v36H0z'/%3E%3C/svg%3E");
  background-color: currentColor;
  -webkit-mask-image: var(--svg);
  mask-image: var(--svg);
  -webkit-mask-repeat: no-repeat;
  mask-repeat: no-repeat;
  -webkit-mask-size: 100% 100%;
  mask-size: 100% 100%;
}
.action-button{
    border: none;
    background-color: #fea3a3;
}
.letter-spacing-3{
    letter-spacing: 0.5rem;
    font-size: 4rem;
}
    </style>
    <div class="container">
       <div class="main-box px-2 pt-3 mt-2 d-flex flex-column mb-5 pb-2 rounded-2">
        <div class="d-flex flex-row justify-content-between">
        </div>
        <div class="d-flex flex-row justify-content-center">
             <img src={{ asset('/logo/logo.png') }} alt="" class="object-fit-contain w-50">
        </div>
        <div class="mt-5">
            <h1 class="fw-bold  text-start">
                🐾 Your Application is Under Review, {{$name}}! 🐾
            </h1>
        </div>
        <div>
            <p>
                Thank you so much for applying to adopt <strong>{{$pet_name}}</strong>!
                 We are thrilled that you are considering giving a loving home to this 
                 special friend. ❤️ Our team is currently reviewing your application, 
                 and we are devoted to ensuring the best fits for all our furry companions.
                  🐶✨
            </p>
            <p>
                If you have any questions or just want to share your excitement,
                 please hit that reply button! Our customer care team is here for
                  you and can't wait to hear from you. 
                Your journey to give a pet a forever home is truly heartwarming! 🏡💖
            </p>
        </div>
        <div>
        </div>
        <div class="why-container mt-auto px-2 py-2 bg-dark last-container">
            <p class="text-center">
              You recieved this email because you applied for a pet at<a href="htts://Petpalsadoption.com">
                  Petpalsadoption.com
            </p> 
          </a>
          <p class="text-center" style="font-size: 12px;">@2024 Petpalsadoption. All rights Reserved</p>
      </div>
       </div>
    </div>
</body>
</html>