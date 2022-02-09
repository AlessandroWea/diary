function sendRequestJSON(method, url, body = null)
{
    const headers = {
        'Content-Type' : 'application/json'
    }
    return fetch(url, {
        method: method,
        body: body ? JSON.stringify(body) : null,
        headers: headers
    }).then(response => {
        if(response.ok){
            return response.json()
        }

        return response.json().then(error => {
            const e = new Error('Smth went wrong')
            e.data = error
            throw e;
        })
    })
}

function sendRequest(method, url, body = null)
{
     return fetch(url, {
            method: method,
            body: body ? body : null,
        }).then(response => {
            if(response.ok){
                return response.json()
            }

            return response.json().then(error => {
                const e = new Error('Smth went wrong')
                e.data = error
                throw e;
            })
        })   
}