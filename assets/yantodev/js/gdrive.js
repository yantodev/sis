function get_access_token_using_saved_refresh_token() {
    // from the oauth playground
    const refresh_token = "1/0PvMAoF9GaJFqbNsLZQg-f9NXEljQclmRP4Gwfdo_0";
    // from the API console
    const client_id = "576354759830-m7h255h5e5n5pe2rbotpttvkf05q6usv.apps.googleusercontent.com";
    // from the API console
    const client_secret = "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";
    // from https://developers.google.com/identity/protocols/OAuth2WebServer#offline
    const refresh_url = "https://www.googleapis.com/oauth2/v4/token";

    const post_body = `grant_type=refresh_token&client_id=${encodeURIComponent(client_id)}&client_secret=${encodeURIComponent(client_secret)}&refresh_token=${encodeURIComponent(refresh_token)}`;

    let refresh_request = {
        body: post_body,
        method: "POST",
        headers: new Headers({
            'Content-Type': 'application/x-www-form-urlencoded'
        })
    }

    // post to the refresh endpoint, parse the json response and use the access token to call files.list
    fetch(refresh_url, refresh_request).then( response => {
            return(response.json());
        }).then( response_json =>  {
            console.log(response_json);
            files_list(response_json.access_token);
    });
}

// a quick and dirty function to list some Drive files using the newly acquired access token
function files_list (access_token) {
    const drive_url = "https://www.googleapis.com/drive/v3/files";
    let drive_request = {
        method: "GET",
        headers: new Headers({
            Authorization: "Bearer "+access_token
        })
    }
    fetch(drive_url, drive_request).then( response => {
        return(response.json());
    }).then( list =>  {
        console.log("Found a file called "+list.files[0].name);
    });
}

get_access_token_using_saved_refresh_token();