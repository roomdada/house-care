<div>
    
<h4 class="widget-header">Categories</h4>
<ul class="category-list">
    @foreach ($category as $item)
      <li><a href="{{ route('domaine.services.path',$item->slug) }}">{{$item->name}} <span>{{$item->services_count}}</span></a></li>
    @endforeach
</ul>
</div>