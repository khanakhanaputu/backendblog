<?php

function login(){ ?>
  
  <main class="flex items-center justify-center h-screen w-full font-poppins">
      <div class="ml-28">
        <h1 class="uppercase font-bold mb-16 text-xl">logo</h1>

        <div>
          <h1 class="capitalize text-5xl leading-relaxed font-bold">
            <span class="block">hello,</span>
            <span class="block">welcome back</span>
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
            type="password"
            placeholder="Password"
            class="focus:outline-none border border-[#6b6b6b] rounded-md py-3 px-3 w-full font-light text-sm"
          />

          <div class="flex items-center justify-between capitalize">
            <div class="flex gap-2 items-center">
              <input
                type="checkbox"
                class="appearance-none w-5 h-5 border border-[#6b6b6b] rounded-md checked:bg-[#8000D6] checked:border[#8000D6]"
              />

              <p class="text-sm font-light text-[#6b6b6b]">remember me</p>
            </div>
            <a href="" class="text-sm font-light text-[#6b6b6b] underline">
              forget password
            </a>
          </div>

          <button
            class="bg-[#8000D6] w-auto self-start px-7 py-3 text-white rounded-md capitalize my-10"
          >
            sign in
          </button>

          <p class="text-sm font-light text-[#6b6b6b]">
            Don’t have an account?
            <a href="#" class="font-semibold text-[#8000D6]">Sign Up</a>
          </p>
        </form>
      </div>
      <div class="ml-28">
        <img
          src="../public/assets/Programming-rafiki 1.svg"
          alt=""
          class="w-full h-full"
        />
      </div>
    </main>
<?php } ?>