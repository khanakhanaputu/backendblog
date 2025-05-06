<?php

function login($status = false){ 

if(!$status){
  echo "login gagal dawg";
}
  
?>  
  <main class="flex items-center justify-center w-full h-screen bg-black">
      <div class="w-full px-5 md:mx-40 xl:mx-0 xl:px-0 xl:w-auto xl:ml-28">
        <h1 class="mb-16 text-xl font-bold uppercase">logo</h1>

        <div>
          <h1 class="text-3xl font-bold leading-relaxed capitalize xl:text-5xl">
            <span class="block">hello,</span>
            <span class="block">welcome back</span>
          </h1>
          <p class="mb-11 text-[#6b6b6b]">Hey, Let’s create some blogs!</p>
        </div>

        <form action="" method="post" class="flex flex-col gap-5">
          <input
            type="username"
            placeholder="Username"
            name="username"
            class="focus:outline-none border border-[#6b6b6b] rounded-md py-3 px-3 w-full font-light text-sm"
          />
          <input
            type="password"
            placeholder="Password"
            name="password"
            class="focus:outline-none border border-[#6b6b6b] rounded-md py-3 px-3 w-full font-light text-sm"
          />

          <div class="flex items-center justify-between capitalize">
            <div class="flex items-center gap-2">
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
            class="bg-[#8000D6] xl:w-auto self-start px-7 py-3 text-white rounded-md capitalize my-10 w-full"
            type="submit"
          >
            sign in
          </button>

          <p class="text-sm font-light text-[#6b6b6b] text-center xl:text-start">
            Don’t have an account?
            <a href="/register" class="font-semibold text-[#0067d6]">Sign Up</a>
          </p>
        </form>
      </div>
      <div class="hidden ml-28 xl:block">
      <img src="./public/assets/Programming-rafiki.svg" alt="" class="w-full h-full" />

      </div>
    </main>
<?php

} 

?>