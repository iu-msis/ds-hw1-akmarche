var commentApp = new Vue({
  el: '#mainClass',
  data: {
    guest: [{
      id: 0,
      comment: ''
    }],
    commentForm: {},
  },

methods: {
    handleNewCommentForm(e) { //Handles the POST process
      //Build JSON to send
      this.commentForm.comment = this.commentForm.comment;
      const s = JSON.stringify(this.commentForm); //stores data that is passed to form in string format
      console.log(s);

      //POST to remote server
      fetch('api/comment.php', {
        method: "POST", //*GET POST PUT DELETE, etc.
        headers: {
          "Content-Type": "application/json; charset=utf-8"
        },
        body: s //body data type must match "content-type" header
      })
      .then( response => response.json() )
      .then( json => {this.guest.push(json)})
      .catch( err => {
        console.error('COMMENT POST ERROR:');
        console.error(err);
      })

      // Reset workForm
      this.newCommentForm = this.getEmptyNewCommentForm();
    },

      getEmptyNewCommentForm() {
        return {
          comment: null
        }
      },
  },


  created () {
        this.newCommentForm = this.getEmptyNewCommentForm();

        fetch('api/comment.php')
        .then( response => response.json() )
        .then( json => {commentApp.guest = json} )
        .catch( err => {
          console.log('COMMENT ERROR:');
          console.log(err);
        })

  }
});
