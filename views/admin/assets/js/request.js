"use strict";

/**
 * Send post to api and get the response in json.
 * @param {String} endpoint The endpoint to fetch api.
 * @param {Object} data The values to send via post.
 * @param {Object} signal (Optional) The signal for cancel request.
 * @return {Promise<Response>} Return the response in json.
 */
async function post(endpoint, data, signal = null) {
    const result = await fetch(BASE_URL + endpoint, {
        method: "POST",
        header: {
            "Accept": "application/json",
            "Content-Type": "application/json"
        },
        body: data instanceof FormData ? data : JSON.stringify(data),
        signal: signal
    }).catch(error => {
        if (error.name !== "AbortError") { //Not show if the error is AbortError.
            console.error(error);
        }
    });

    const status = result.status;
    const response = await result.json();

    return {status: status, data: response};
}

/**
 * Send get to api and get the response in json.
 * @param {String} endpoint The endpoint to fetch api.
 * @param {Object} data The values to send via get.
 * @param {Object} signal (Optional) The signal for cancel request.
 * @return {Promise<Response>} Return the response in json.
 */
async function get(endpoint, signal = null) {
    const result = await fetch(BASE_URL + endpoint, {
        method: "GET",
        header: {
            "Accept": "application/json",
            "Content-Type": "application/json"
        },
        signal: signal
    }).catch(error => {
        if (error.name !== "AbortError") { //Not show if the error is AbortError.
            console.error(error);
        }
    });

    const status = result.status;
    const response = await result.json();

    return {status: status, data: response};
}
