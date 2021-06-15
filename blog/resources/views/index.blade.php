<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <meta name="description" content="simple_blog" />
        <title>blog_view</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    </head>
    
    <body>
        <h1>blog</h1>
        <p>this is a sample blog</p>
        
        <div class = 'posts'>
            <table border="1" style="border-collapse: collapse">
                <tr>
                    <td>title</td>
                    <td>contents</td>
                </tr>
                
                @foreach($datas as $data)
                    <tr>
                        <th>{{ $data->title }}</th>
                        <th>{{ $data->body }}</th>
                    </tr>
                @endforeach
                <div class = 'pagenate'>
                    {{ $datas -> links()}}
                </div>
            </table>
        </div>
        
       
    </body>
    
</html>
