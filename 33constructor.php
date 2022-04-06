<script>

    function Book(author, title, price)
    {
        this.author= author;
        this.title = title;
        this.price = price;

    }
    let js = new Book("홍길동", "js",120000)
    console.log("js = " + js)
    console.log("js.title = " + js.title)

</script>