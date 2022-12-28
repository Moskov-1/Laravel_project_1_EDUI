<x-content.site-template>
  <x-content.header-template>
    <h1 class="text-white display-1">About</h1>
    <div class="d-inline-flex text-white mb-5">
        <p class="m-0 text-uppercase"><a class="text-white" href="/">Home</a></p>
        <i class="fa fa-angle-double-right pt-1 px-3"></i>
        <p class="m-0 text-uppercase">About</p>
    </div>
  </x-content.header-template>
  <x-content.blog-template :blogs="$blogs">
  </x-content.blog-template>
</x-content.site-template>

