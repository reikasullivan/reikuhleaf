-- Blog Posts page
CREATE TABLE blogs (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
  category TEXT NOT NULL,
  title TEXT NOT NULL,
  content TEXT NOT NULL,
  blog_date TEXT NOT NULL
);

INSERT INTO blogs (category, title, content, blog_date)
  VALUES ('short essays', 'Sapere Aude: Dare to Know!', 'Lorem ipsum dolor sit amet,
    consectetur adipiscing elit. Duis vitae orci quis leo dignissim hendrerit a a
     neque. Fusce at ullamcorper velit. Integer pharetra enim in massa sagittis, i
     n rutrum ipsum consequat. Ut tellus augue, auctor a quam id, porttitor tristique
     ligula. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce
      nec ullamcorper nulla. Sed elementum condimentum ipsum, quis dictum tellus
       facilisis sit amet. Fusce vehicula, lacus eu convallis tempus, justo ligula
       ornare quam, nec rutrum sem metus vitae urna.

       Vivamus quis feugiat urna. Aliquam hendrerit efficitur elit sed elementum.
       Aliquam odio est, cursus eu auctor posuere, facilisis sit amet diam. Etiam
       ornare, justo sed tincidunt finibus, quam dui egestas elit, eget consectetur
       nibh lorem quis felis. Pellentesque vitae consequat mi. Vestibulum imperdiet
       risus nibh, vel feugiat lorem blandit eget. Praesent non facilisis tortor.
       Mauris ornare, neque id vehicula sollicitudin, ante eros porta sapien, non
       auctor ante velit ut lectus. Nulla condimentum lobortis urna, ac imperdiet
       risus congue non.

       Curabitur sodales consequat lacus, ac consequat lectus pulvinar sed.
       Etiam ut dui ac turpis congue varius at id ipsum. Aliquam laoreet justo
       at efficitur cursus. Aliquam erat volutpat. In hac habitasse platea dictumst.
       Quisque varius, arcu vitae vulputate pulvinar, augue lorem iaculis quam, id
        vehicula nisi magna nec enim. Duis ac lectus nisi. Maecenas eu lacus eget elit
        elementum tincidunt vitae a orci. Proin fermentum eu magna eget ultrices.
        Duis faucibus accumsan congue.', '18 juni 2018');

INSERT INTO blogs (category, title, content, blog_date)
  VALUES ('product', 'Tommy Bahama Beach Chairs', 'Your feline guests come and
    go as they please. Sometimes they come solo, and other times, they bring
    other colorful pals and play. They leave behind some nice gifts that you
    can use as currency to purchase more food and toys for other new cats to
    come frequent your location.', '27 juli 2018');
