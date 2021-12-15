function search() {
	var terms = document.getElementById("terms").value;
	console.log(terms);
	axios
		.get("https://www.googleapis.com/books/v1/volumes?q=" + terms)
		.then((response) => {
			var results = response.data.items;
			var ul = document.getElementById("results");
			ul.innerText = "";
			for (var i = 0; i < results.length; i++) {
				var title = results[i].volumeInfo.title;
				var a = document.createElement("button");
				var li = document.createElement("li");

				a.innerText = title;
				a.href = results[i].selfLink;
				a.id = results[i].selfLink;
				a.onclick = function show_infos() {
					axios.get(this.id).then((response) => {
						var infoBook = response.data.volumeInfo;
						var form = document.createElement("form");
						document.body.appendChild(form);
						form.method = "POST";
						form.action = "ajout_livres.php";

						var title = document.createElement("input");
						title.value = infoBook.title;
						title.name = "titre";

						var auteur = document.createElement("input");
						auteur.value = infoBook.authors[0];
						auteur.name = "auteur";

						var editeur = document.createElement("input");
						editeur.value = infoBook.publisher;
						editeur.name = "editeur";

						var resume = document.createElement("input");
						resume.value = infoBook.description;
						resume.name = "resume";

						var date_parrution = document.createElement("input");
						date_parrution.value = infoBook.publishedDate;
						date_parrution.name = "date_parrution";

						form.appendChild(title);
						form.appendChild(editeur);
						form.appendChild(auteur);
						form.appendChild(resume);
						form.appendChild(date_parrution);
						form.submit();
					});
				};
				li.appendChild(a);
				ul.appendChild(li);
			}
		});
	document.getElementById("results_message").style.display = "block";
}
