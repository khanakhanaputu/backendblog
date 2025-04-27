<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../public/css/output.css" />
    <title>Register</title>
  </head>
  <body class="font-poppins">
    <main class="flex items-center justify-center h-screen w-full">
      <div class="ml-28">
        <h1 class="uppercase font-bold mb-16 text-xl">logo</h1>

        <div>
          <h1 class="text-5xl leading-relaxed font-bold">
            <span class="block">Welcome,</span>
            <span class="block">Create your account</span>
          </h1>
          <p class="mb-11 text-[#6b6b6b]">Hey, Let’s create some blogs!</p>
        </div>

        <form action="" method="post" class="flex flex-col gap-5">
          <input
            type="username"
            placeholder="Username"
            class="focus:outline-none border border-[#6b6b6b] rounded-md py-3 px-3 w-full font-light text-sm"
          />
          <input
            type="text"
            placeholder="Password"
            class="focus:outline-none border border-[#6b6b6b] rounded-md py-3 px-3 w-full font-light text-sm"
          />
          <input
            type="text"
            placeholder="Confirm Password"
            class="focus:outline-none border border-[#6b6b6b] rounded-md py-3 px-3 w-full font-light text-sm"
          />

          <button
            class="bg-[#8000D6] w-auto self-start px-7 py-3 text-white rounded-md capitalize mb-10"
          >
            sign up
          </button>

          <p class="text-sm font-light text-[#6b6b6b]">
            Already have an account?
            <a href="#" class="font-semibold text-[#8000D6]">Sign In</a>
          </p>
        </form>
      </div>
      <div class="ml-28">
        <img
          src="../public/assets/Devices-cuate.svg"
          alt=""
          class="w-full h-full"
        />
      </div>
    </main>
  </body>
</html>
