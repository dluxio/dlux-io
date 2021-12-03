dmx.config({
  "new": {
    "api1": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "array",
            "name": "result",
            "sub": [
              {
                "type": "text",
                "name": "author"
              },
              {
                "type": "text",
                "name": "permlink"
              },
              {
                "type": "number",
                "name": "block"
              },
              {
                "type": "number",
                "name": "votes"
              },
              {
                "type": "number",
                "name": "voteweight"
              },
              {
                "type": "number",
                "name": "promote"
              },
              {
                "type": "boolean",
                "name": "paid"
              },
              {
                "type": "text",
                "name": "url"
              }
            ]
          },
          {
            "type": "text",
            "name": "node"
          }
        ]
      },
      {
        "type": "object",
        "name": "headers",
        "sub": [
          {
            "type": "text",
            "name": "access-control-allow-origin"
          },
          {
            "type": "text",
            "name": "content-length"
          },
          {
            "type": "text",
            "name": "content-type"
          },
          {
            "type": "text",
            "name": "date"
          },
          {
            "type": "text",
            "name": "etag"
          },
          {
            "type": "text",
            "name": "server"
          },
          {
            "type": "text",
            "name": "via"
          },
          {
            "type": "text",
            "name": "x-powered-by"
          }
        ]
      }
    ],
    "repeat1": {
      "meta": null,
      "outputType": "text"
    }
  },
  "index": {
    "tradefts": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "array",
            "name": "result",
            "sub": [
              {
                "type": "text",
                "name": "from"
              },
              {
                "type": "text",
                "name": "to"
              },
              {
                "type": "number",
                "name": "price"
              },
              {
                "type": "text",
                "name": "item"
              },
              {
                "type": "text",
                "name": "kind"
              },
              {
                "type": "text",
                "name": "set"
              },
              {
                "type": "text",
                "name": "uid"
              },
              {
                "type": "text",
                "name": "script"
              }
            ]
          },
          {
            "type": "text",
            "name": "kind"
          },
          {
            "type": "text",
            "name": "node"
          },
          {
            "type": "number",
            "name": "behind"
          },
          {
            "type": "text",
            "name": "VERSION"
          }
        ]
      },
      {
        "type": "object",
        "name": "headers",
        "sub": [
          {
            "type": "text",
            "name": "access-control-allow-origin"
          },
          {
            "type": "text",
            "name": "connection"
          },
          {
            "type": "text",
            "name": "content-length"
          },
          {
            "type": "text",
            "name": "content-type"
          },
          {
            "type": "text",
            "name": "date"
          },
          {
            "type": "text",
            "name": "etag"
          },
          {
            "type": "text",
            "name": "server"
          },
          {
            "type": "text",
            "name": "via"
          },
          {
            "type": "text",
            "name": "x-powered-by"
          }
        ]
      }
    ],
    "tradenfts": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "array",
            "name": "result",
            "sub": [
              {
                "type": "text",
                "name": "from"
              },
              {
                "type": "text",
                "name": "to"
              },
              {
                "type": "number",
                "name": "price"
              },
              {
                "type": "text",
                "name": "item"
              },
              {
                "type": "text",
                "name": "kind"
              },
              {
                "type": "text",
                "name": "set"
              },
              {
                "type": "text",
                "name": "uid"
              },
              {
                "type": "text",
                "name": "script"
              }
            ]
          },
          {
            "type": "text",
            "name": "kind"
          },
          {
            "type": "text",
            "name": "node"
          },
          {
            "type": "number",
            "name": "behind"
          },
          {
            "type": "text",
            "name": "VERSION"
          }
        ]
      },
      {
        "type": "object",
        "name": "headers",
        "sub": [
          {
            "type": "text",
            "name": "access-control-allow-origin"
          },
          {
            "type": "text",
            "name": "connection"
          },
          {
            "type": "text",
            "name": "content-length"
          },
          {
            "type": "text",
            "name": "content-type"
          },
          {
            "type": "text",
            "name": "date"
          },
          {
            "type": "text",
            "name": "etag"
          },
          {
            "type": "text",
            "name": "server"
          },
          {
            "type": "text",
            "name": "via"
          },
          {
            "type": "text",
            "name": "x-powered-by"
          }
        ]
      }
    ],
    "trade-nft-cards": {
      "meta": [
        {
          "type": "text",
          "name": "from"
        },
        {
          "type": "text",
          "name": "to"
        },
        {
          "type": "number",
          "name": "price"
        },
        {
          "type": "text",
          "name": "item"
        },
        {
          "type": "text",
          "name": "kind"
        },
        {
          "type": "text",
          "name": "set"
        },
        {
          "type": "text",
          "name": "uid"
        },
        {
          "type": "text",
          "name": "script"
        }
      ],
      "outputType": "array"
    },
    "inventory-trades": {
      "meta": [
        {
          "type": "text",
          "name": "from"
        },
        {
          "type": "text",
          "name": "to"
        },
        {
          "type": "number",
          "name": "price"
        },
        {
          "type": "text",
          "name": "item"
        },
        {
          "type": "text",
          "name": "kind"
        },
        {
          "type": "text",
          "name": "set"
        },
        {
          "type": "text",
          "name": "uid"
        },
        {
          "type": "text",
          "name": "script"
        }
      ],
      "outputType": "array"
    },
    "dexapi": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "object",
            "name": "markets",
            "sub": [
              {
                "type": "object",
                "name": "hbd",
                "sub": [
                  {
                    "type": "text",
                    "name": "buyBook"
                  },
                  {
                    "type": "key_array",
                    "name": "days",
                    "sub": [
                      {
                        "type": "number",
                        "name": "b"
                      },
                      {
                        "type": "number",
                        "name": "c"
                      },
                      {
                        "type": "number",
                        "name": "d"
                      },
                      {
                        "type": "number",
                        "name": "o"
                      },
                      {
                        "type": "number",
                        "name": "t"
                      },
                      {
                        "type": "number",
                        "name": "v"
                      }
                    ]
                  },
                  {
                    "type": "text",
                    "name": "sellBook"
                  },
                  {
                    "type": "text",
                    "name": "tick"
                  },
                  {
                    "type": "array",
                    "name": "sells",
                    "sub": [
                      {
                        "type": "number",
                        "name": "amount"
                      },
                      {
                        "type": "number",
                        "name": "block"
                      },
                      {
                        "type": "text",
                        "name": "expire_path"
                      },
                      {
                        "type": "number",
                        "name": "fee"
                      },
                      {
                        "type": "text",
                        "name": "from"
                      },
                      {
                        "type": "number",
                        "name": "hbd"
                      },
                      {
                        "type": "number",
                        "name": "hive"
                      },
                      {
                        "type": "text",
                        "name": "rate"
                      },
                      {
                        "type": "text",
                        "name": "txid"
                      },
                      {
                        "type": "text",
                        "name": "type"
                      },
                      {
                        "type": "text",
                        "name": "key"
                      },
                      {
                        "type": "object",
                        "name": "hivenai",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "precision"
                          },
                          {
                            "type": "text",
                            "name": "token"
                          }
                        ]
                      },
                      {
                        "type": "object",
                        "name": "hbdnai",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "precision"
                          },
                          {
                            "type": "text",
                            "name": "token"
                          }
                        ]
                      },
                      {
                        "type": "object",
                        "name": "amountnai",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "precision"
                          },
                          {
                            "type": "text",
                            "name": "token"
                          }
                        ]
                      },
                      {
                        "type": "object",
                        "name": "feenai",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "precision"
                          },
                          {
                            "type": "text",
                            "name": "token"
                          }
                        ]
                      }
                    ]
                  },
                  {
                    "type": "array",
                    "name": "buys",
                    "sub": [
                      {
                        "type": "text",
                        "name": "amount"
                      },
                      {
                        "type": "number",
                        "name": "block"
                      },
                      {
                        "type": "text",
                        "name": "expire_path"
                      },
                      {
                        "type": "number",
                        "name": "fee"
                      },
                      {
                        "type": "text",
                        "name": "from"
                      },
                      {
                        "type": "number",
                        "name": "hbd"
                      },
                      {
                        "type": "number",
                        "name": "hive"
                      },
                      {
                        "type": "text",
                        "name": "rate"
                      },
                      {
                        "type": "text",
                        "name": "txid"
                      },
                      {
                        "type": "text",
                        "name": "type"
                      },
                      {
                        "type": "text",
                        "name": "key"
                      },
                      {
                        "type": "object",
                        "name": "hivenai",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "precision"
                          },
                          {
                            "type": "text",
                            "name": "token"
                          }
                        ]
                      },
                      {
                        "type": "object",
                        "name": "hbdnai",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "precision"
                          },
                          {
                            "type": "text",
                            "name": "token"
                          }
                        ]
                      },
                      {
                        "type": "object",
                        "name": "amountnai",
                        "sub": [
                          {
                            "type": "text",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "precision"
                          },
                          {
                            "type": "text",
                            "name": "token"
                          }
                        ]
                      },
                      {
                        "type": "object",
                        "name": "feenai",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "precision"
                          },
                          {
                            "type": "text",
                            "name": "token"
                          }
                        ]
                      }
                    ]
                  }
                ]
              },
              {
                "type": "object",
                "name": "hive",
                "sub": [
                  {
                    "type": "text",
                    "name": "buyBook"
                  },
                  {
                    "type": "key_array",
                    "name": "days",
                    "sub": [
                      {
                        "type": "number",
                        "name": "b"
                      },
                      {
                        "type": "number",
                        "name": "c"
                      },
                      {
                        "type": "number",
                        "name": "d"
                      },
                      {
                        "type": "number",
                        "name": "o"
                      },
                      {
                        "type": "number",
                        "name": "t"
                      },
                      {
                        "type": "number",
                        "name": "v"
                      }
                    ]
                  },
                  {
                    "type": "key_array",
                    "name": "his",
                    "sub": [
                      {
                        "type": "number",
                        "name": "base_vol"
                      },
                      {
                        "type": "number",
                        "name": "block"
                      },
                      {
                        "type": "text",
                        "name": "id"
                      },
                      {
                        "type": "text",
                        "name": "price"
                      },
                      {
                        "type": "number",
                        "name": "t"
                      },
                      {
                        "type": "text",
                        "name": "target"
                      },
                      {
                        "type": "number",
                        "name": "target_vol"
                      },
                      {
                        "type": "text",
                        "name": "type"
                      }
                    ]
                  },
                  {
                    "type": "text",
                    "name": "sellBook"
                  },
                  {
                    "type": "object",
                    "name": "sellOrders",
                    "sub": [
                      {
                        "type": "object",
                        "name": "0.990000:DLUXQmUzjUidqXadLVxjQPjjPT5DGqN8YzNDM4PPyzb9vJ75Jv",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "text",
                            "name": "expire_path"
                          },
                          {
                            "type": "number",
                            "name": "fee"
                          },
                          {
                            "type": "text",
                            "name": "from"
                          },
                          {
                            "type": "number",
                            "name": "hbd"
                          },
                          {
                            "type": "number",
                            "name": "hive"
                          },
                          {
                            "type": "object",
                            "name": "partial",
                            "sub": [
                              {
                                "type": "object",
                                "name": "1b78df812e7f51ad9c28adf0e445ec14ca24a20b",
                                "sub": [
                                  {
                                    "type": "number",
                                    "name": "coin"
                                  },
                                  {
                                    "type": "number",
                                    "name": "token"
                                  }
                                ]
                              }
                            ]
                          },
                          {
                            "type": "text",
                            "name": "rate"
                          },
                          {
                            "type": "text",
                            "name": "txid"
                          },
                          {
                            "type": "text",
                            "name": "type"
                          },
                          {
                            "type": "text",
                            "name": "key"
                          }
                        ]
                      },
                      {
                        "type": "object",
                        "name": "0.999000:DLUXQmPwVnRDnqVrN7SeYEHEoaMRrYyHWfuQTFANcisCtX6W1G",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "text",
                            "name": "expire_path"
                          },
                          {
                            "type": "number",
                            "name": "fee"
                          },
                          {
                            "type": "text",
                            "name": "from"
                          },
                          {
                            "type": "number",
                            "name": "hbd"
                          },
                          {
                            "type": "number",
                            "name": "hive"
                          },
                          {
                            "type": "text",
                            "name": "rate"
                          },
                          {
                            "type": "text",
                            "name": "txid"
                          },
                          {
                            "type": "text",
                            "name": "type"
                          },
                          {
                            "type": "text",
                            "name": "key"
                          }
                        ]
                      },
                      {
                        "type": "object",
                        "name": "0.99:DLUXQmUzjUidqXadLVxjQPjjPT5DGqN8YzNDM4PPyzb9vJ75Jv",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "block"
                          },
                          {
                            "type": "text",
                            "name": "expire_path"
                          },
                          {
                            "type": "number",
                            "name": "fee"
                          },
                          {
                            "type": "text",
                            "name": "from"
                          },
                          {
                            "type": "number",
                            "name": "hbd"
                          },
                          {
                            "type": "number",
                            "name": "hive"
                          },
                          {
                            "type": "object",
                            "name": "partial",
                            "sub": [
                              {
                                "type": "object",
                                "name": "1b78df812e7f51ad9c28adf0e445ec14ca24a20b",
                                "sub": [
                                  {
                                    "type": "number",
                                    "name": "coin"
                                  },
                                  {
                                    "type": "number",
                                    "name": "token"
                                  }
                                ]
                              }
                            ]
                          },
                          {
                            "type": "text",
                            "name": "rate"
                          },
                          {
                            "type": "text",
                            "name": "txid"
                          },
                          {
                            "type": "text",
                            "name": "type"
                          },
                          {
                            "type": "text",
                            "name": "key"
                          }
                        ]
                      }
                    ]
                  },
                  {
                    "type": "text",
                    "name": "tick"
                  },
                  {
                    "type": "array",
                    "name": "sells",
                    "sub": [
                      {
                        "type": "number",
                        "name": "amount"
                      },
                      {
                        "type": "number",
                        "name": "block"
                      },
                      {
                        "type": "text",
                        "name": "expire_path"
                      },
                      {
                        "type": "number",
                        "name": "fee"
                      },
                      {
                        "type": "text",
                        "name": "from"
                      },
                      {
                        "type": "number",
                        "name": "hbd"
                      },
                      {
                        "type": "number",
                        "name": "hive"
                      },
                      {
                        "type": "text",
                        "name": "rate"
                      },
                      {
                        "type": "text",
                        "name": "txid"
                      },
                      {
                        "type": "text",
                        "name": "type"
                      },
                      {
                        "type": "text",
                        "name": "key"
                      },
                      {
                        "type": "object",
                        "name": "hivenai",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "precision"
                          },
                          {
                            "type": "text",
                            "name": "token"
                          }
                        ]
                      },
                      {
                        "type": "object",
                        "name": "hbdnai",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "precision"
                          },
                          {
                            "type": "text",
                            "name": "token"
                          }
                        ]
                      },
                      {
                        "type": "object",
                        "name": "amountnai",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "precision"
                          },
                          {
                            "type": "text",
                            "name": "token"
                          }
                        ]
                      },
                      {
                        "type": "object",
                        "name": "feenai",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "precision"
                          },
                          {
                            "type": "text",
                            "name": "token"
                          }
                        ]
                      }
                    ]
                  },
                  {
                    "type": "array",
                    "name": "buys",
                    "sub": [
                      {
                        "type": "number",
                        "name": "amount"
                      },
                      {
                        "type": "number",
                        "name": "block"
                      },
                      {
                        "type": "text",
                        "name": "expire_path"
                      },
                      {
                        "type": "number",
                        "name": "fee"
                      },
                      {
                        "type": "text",
                        "name": "from"
                      },
                      {
                        "type": "number",
                        "name": "hbd"
                      },
                      {
                        "type": "number",
                        "name": "hive"
                      },
                      {
                        "type": "text",
                        "name": "rate"
                      },
                      {
                        "type": "text",
                        "name": "txid"
                      },
                      {
                        "type": "text",
                        "name": "type"
                      },
                      {
                        "type": "text",
                        "name": "key"
                      },
                      {
                        "type": "object",
                        "name": "hivenai",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "precision"
                          },
                          {
                            "type": "text",
                            "name": "token"
                          }
                        ]
                      },
                      {
                        "type": "object",
                        "name": "hbdnai",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "precision"
                          },
                          {
                            "type": "text",
                            "name": "token"
                          }
                        ]
                      },
                      {
                        "type": "object",
                        "name": "amountnai",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "precision"
                          },
                          {
                            "type": "text",
                            "name": "token"
                          }
                        ]
                      },
                      {
                        "type": "object",
                        "name": "feenai",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "precision"
                          },
                          {
                            "type": "text",
                            "name": "token"
                          }
                        ]
                      }
                    ]
                  }
                ]
              }
            ]
          },
          {
            "type": "key_array",
            "name": "stats",
            "sub": [
              {
                "type": "number",
                "name": "block"
              },
              {
                "type": "text",
                "name": "rate"
              },
              {
                "type": "number",
                "name": "vol"
              }
            ]
          },
          {
            "type": "key_array",
            "name": "queue",
            "sub": [
              {
                "type": "number",
                "name": "c"
              },
              {
                "type": "number",
                "name": "g"
              },
              {
                "type": "number",
                "name": "l"
              },
              {
                "type": "number",
                "name": "t"
              }
            ]
          },
          {
            "type": "text",
            "name": "node"
          },
          {
            "type": "number",
            "name": "behind"
          },
          {
            "type": "text",
            "name": "VERSION"
          }
        ]
      },
      {
        "type": "object",
        "name": "headers",
        "sub": [
          {
            "type": "text",
            "name": "access-control-allow-origin"
          },
          {
            "type": "text",
            "name": "connection"
          },
          {
            "type": "text",
            "name": "content-length"
          },
          {
            "type": "text",
            "name": "content-type"
          },
          {
            "type": "text",
            "name": "date"
          },
          {
            "type": "text",
            "name": "etag"
          },
          {
            "type": "text",
            "name": "server"
          },
          {
            "type": "text",
            "name": "via"
          },
          {
            "type": "text",
            "name": "x-powered-by"
          }
        ]
      }
    ],
    "orderbookview": {
      "meta": null,
      "outputType": "array"
    },
    "repeat1": {
      "meta": [
        {
          "name": "$index",
          "type": "number"
        },
        {
          "name": "$key",
          "type": "text"
        },
        {
          "name": "$value",
          "type": "object"
        },
        {
          "type": "number",
          "name": "amount"
        },
        {
          "type": "number",
          "name": "block"
        },
        {
          "type": "text",
          "name": "expire_path"
        },
        {
          "type": "number",
          "name": "fee"
        },
        {
          "type": "text",
          "name": "from"
        },
        {
          "type": "number",
          "name": "hbd"
        },
        {
          "type": "number",
          "name": "hive"
        },
        {
          "type": "number",
          "name": "rate"
        },
        {
          "type": "text",
          "name": "txid"
        },
        {
          "type": "text",
          "name": "type"
        },
        {
          "type": "text",
          "name": "key"
        },
        {
          "type": "object",
          "name": "hivenai",
          "sub": [
            {
              "type": "number",
              "name": "amount"
            },
            {
              "type": "number",
              "name": "precision"
            },
            {
              "type": "text",
              "name": "token"
            }
          ]
        },
        {
          "type": "object",
          "name": "hbdnai",
          "sub": [
            {
              "type": "number",
              "name": "amount"
            },
            {
              "type": "number",
              "name": "precision"
            },
            {
              "type": "text",
              "name": "token"
            }
          ]
        },
        {
          "type": "object",
          "name": "amountnai",
          "sub": [
            {
              "type": "number",
              "name": "amount"
            },
            {
              "type": "number",
              "name": "precision"
            },
            {
              "type": "text",
              "name": "token"
            }
          ]
        },
        {
          "type": "object",
          "name": "feenai",
          "sub": [
            {
              "type": "number",
              "name": "amount"
            },
            {
              "type": "number",
              "name": "precision"
            },
            {
              "type": "text",
              "name": "token"
            }
          ]
        }
      ],
      "outputType": "array"
    },
    "hivebuys": {
      "meta": [
        {
          "type": "text",
          "name": "trade_id"
        },
        {
          "type": "text",
          "name": "price"
        },
        {
          "type": "text",
          "name": "base_volume"
        },
        {
          "type": "text",
          "name": "target_volume"
        },
        {
          "type": "number",
          "name": "trade_timestamp"
        },
        {
          "type": "text",
          "name": "type"
        }
      ],
      "outputType": "array"
    },
    "buyorders": {
      "meta": [
        {
          "name": "$key",
          "type": "text"
        },
        {
          "name": "$value",
          "type": "array",
          "sub": [
            {
              "type": "number",
              "name": "amount"
            },
            {
              "type": "number",
              "name": "block"
            },
            {
              "type": "text",
              "name": "expire_path"
            },
            {
              "type": "number",
              "name": "fee"
            },
            {
              "type": "text",
              "name": "from"
            },
            {
              "type": "number",
              "name": "hbd"
            },
            {
              "type": "number",
              "name": "hive"
            },
            {
              "type": "number",
              "name": "rate"
            },
            {
              "type": "text",
              "name": "txid"
            },
            {
              "type": "text",
              "name": "type"
            },
            {
              "type": "text",
              "name": "key"
            },
            {
              "type": "object",
              "name": "hivenai",
              "sub": [
                {
                  "type": "number",
                  "name": "amount"
                },
                {
                  "type": "number",
                  "name": "precision"
                },
                {
                  "type": "text",
                  "name": "token"
                }
              ]
            },
            {
              "type": "object",
              "name": "hbdnai",
              "sub": [
                {
                  "type": "number",
                  "name": "amount"
                },
                {
                  "type": "number",
                  "name": "precision"
                },
                {
                  "type": "text",
                  "name": "token"
                }
              ]
            },
            {
              "type": "object",
              "name": "amountnai",
              "sub": [
                {
                  "type": "number",
                  "name": "amount"
                },
                {
                  "type": "number",
                  "name": "precision"
                },
                {
                  "type": "text",
                  "name": "token"
                }
              ]
            },
            {
              "type": "object",
              "name": "feenai",
              "sub": [
                {
                  "type": "number",
                  "name": "amount"
                },
                {
                  "type": "number",
                  "name": "precision"
                },
                {
                  "type": "text",
                  "name": "token"
                }
              ]
            }
          ]
        }
      ],
      "outputType": "object"
    },
    "recenthiveapi": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "array",
            "name": "recent_trades",
            "sub": [
              {
                "type": "text",
                "name": "trade_id"
              },
              {
                "type": "text",
                "name": "price"
              },
              {
                "type": "text",
                "name": "base_volume"
              },
              {
                "type": "text",
                "name": "target_volume"
              },
              {
                "type": "number",
                "name": "trade_timestamp"
              },
              {
                "type": "text",
                "name": "type"
              }
            ]
          },
          {
            "type": "text",
            "name": "node"
          },
          {
            "type": "number",
            "name": "behind"
          },
          {
            "type": "text",
            "name": "VERSION"
          }
        ]
      },
      {
        "type": "object",
        "name": "headers",
        "sub": [
          {
            "type": "text",
            "name": "access-control-allow-origin"
          },
          {
            "type": "text",
            "name": "connection"
          },
          {
            "type": "text",
            "name": "content-length"
          },
          {
            "type": "text",
            "name": "content-type"
          },
          {
            "type": "text",
            "name": "date"
          },
          {
            "type": "text",
            "name": "etag"
          },
          {
            "type": "text",
            "name": "server"
          },
          {
            "type": "text",
            "name": "via"
          },
          {
            "type": "text",
            "name": "x-powered-by"
          }
        ]
      }
    ],
    "recenthbdapi": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "array",
            "name": "recent_trades"
          },
          {
            "type": "text",
            "name": "node"
          },
          {
            "type": "number",
            "name": "behind"
          },
          {
            "type": "text",
            "name": "VERSION"
          }
        ]
      },
      {
        "type": "object",
        "name": "headers",
        "sub": [
          {
            "type": "text",
            "name": "access-control-allow-origin"
          },
          {
            "type": "text",
            "name": "content-length"
          },
          {
            "type": "text",
            "name": "content-type"
          },
          {
            "type": "text",
            "name": "date"
          },
          {
            "type": "text",
            "name": "etag"
          },
          {
            "type": "text",
            "name": "server"
          },
          {
            "type": "text",
            "name": "via"
          },
          {
            "type": "text",
            "name": "x-powered-by"
          }
        ]
      }
    ],
    "orderhistory": {
      "meta": [
        {
          "type": "text",
          "name": "trade_id"
        },
        {
          "type": "text",
          "name": "price"
        },
        {
          "type": "text",
          "name": "base_volume"
        },
        {
          "type": "text",
          "name": "target_volume"
        },
        {
          "type": "number",
          "name": "trade_timestamp"
        },
        {
          "type": "text",
          "name": "type"
        }
      ],
      "outputType": "array"
    },
    "hiveprice": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "object",
            "name": "hive",
            "sub": [
              {
                "type": "number",
                "name": "usd"
              }
            ]
          }
        ]
      },
      {
        "type": "object",
        "name": "headers",
        "sub": [
          {
            "type": "text",
            "name": "access-control-allow-headers"
          },
          {
            "type": "text",
            "name": "access-control-allow-methods"
          },
          {
            "type": "text",
            "name": "access-control-allow-origin"
          },
          {
            "type": "text",
            "name": "access-control-expose-headers"
          },
          {
            "type": "text",
            "name": "access-control-max-age"
          },
          {
            "type": "text",
            "name": "access-control-request-method"
          },
          {
            "type": "text",
            "name": "alternate-protocol"
          },
          {
            "type": "text",
            "name": "cache-control"
          },
          {
            "type": "text",
            "name": "cf-cache-status"
          },
          {
            "type": "text",
            "name": "cf-ray"
          },
          {
            "type": "text",
            "name": "content-encoding"
          },
          {
            "type": "text",
            "name": "content-type"
          },
          {
            "type": "text",
            "name": "date"
          },
          {
            "type": "text",
            "name": "etag"
          },
          {
            "type": "text",
            "name": "expect-ct"
          },
          {
            "type": "text",
            "name": "server"
          },
          {
            "type": "text",
            "name": "vary"
          },
          {
            "type": "text",
            "name": "x-request-id"
          },
          {
            "type": "text",
            "name": "x-runtime"
          }
        ]
      }
    ],
    "hbdprice": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "object",
            "name": "hive_dollar",
            "sub": [
              {
                "type": "number",
                "name": "usd"
              }
            ]
          }
        ]
      },
      {
        "type": "object",
        "name": "headers",
        "sub": [
          {
            "type": "text",
            "name": "access-control-allow-headers"
          },
          {
            "type": "text",
            "name": "access-control-allow-methods"
          },
          {
            "type": "text",
            "name": "access-control-allow-origin"
          },
          {
            "type": "text",
            "name": "access-control-expose-headers"
          },
          {
            "type": "text",
            "name": "access-control-max-age"
          },
          {
            "type": "text",
            "name": "access-control-request-method"
          },
          {
            "type": "text",
            "name": "alternate-protocol"
          },
          {
            "type": "text",
            "name": "cache-control"
          },
          {
            "type": "text",
            "name": "cf-cache-status"
          },
          {
            "type": "text",
            "name": "cf-ray"
          },
          {
            "type": "text",
            "name": "content-encoding"
          },
          {
            "type": "text",
            "name": "content-type"
          },
          {
            "type": "text",
            "name": "date"
          },
          {
            "type": "text",
            "name": "etag"
          },
          {
            "type": "text",
            "name": "expect-ct"
          },
          {
            "type": "text",
            "name": "server"
          },
          {
            "type": "text",
            "name": "vary"
          },
          {
            "type": "text",
            "name": "x-request-id"
          },
          {
            "type": "text",
            "name": "x-runtime"
          }
        ]
      }
    ],
    "openordersapi": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "number",
            "name": "balance"
          },
          {
            "type": "number",
            "name": "poweredUp"
          },
          {
            "type": "number",
            "name": "granted"
          },
          {
            "type": "number",
            "name": "granting"
          },
          {
            "type": "number",
            "name": "heldCollateral"
          },
          {
            "type": "array",
            "name": "contracts",
            "sub": [
              {
                "type": "number",
                "name": "amount"
              },
              {
                "type": "number",
                "name": "block"
              },
              {
                "type": "text",
                "name": "expire_path"
              },
              {
                "type": "number",
                "name": "fee"
              },
              {
                "type": "text",
                "name": "from"
              },
              {
                "type": "number",
                "name": "hbd"
              },
              {
                "type": "number",
                "name": "hive"
              },
              {
                "type": "text",
                "name": "rate"
              },
              {
                "type": "text",
                "name": "txid"
              },
              {
                "type": "text",
                "name": "type"
              }
            ]
          },
          {
            "type": "object",
            "name": "up",
            "sub": [
              {
                "type": "number",
                "name": "last"
              },
              {
                "type": "number",
                "name": "max"
              },
              {
                "type": "number",
                "name": "power"
              }
            ]
          },
          {
            "type": "object",
            "name": "down"
          },
          {
            "type": "number",
            "name": "gov"
          },
          {
            "type": "text",
            "name": "node"
          },
          {
            "type": "number",
            "name": "behind"
          },
          {
            "type": "text",
            "name": "VERSION"
          }
        ]
      },
      {
        "type": "object",
        "name": "headers",
        "sub": [
          {
            "type": "text",
            "name": "access-control-allow-origin"
          },
          {
            "type": "text",
            "name": "content-length"
          },
          {
            "type": "text",
            "name": "content-type"
          },
          {
            "type": "text",
            "name": "date"
          },
          {
            "type": "text",
            "name": "etag"
          },
          {
            "type": "text",
            "name": "server"
          },
          {
            "type": "text",
            "name": "via"
          },
          {
            "type": "text",
            "name": "x-powered-by"
          }
        ]
      }
    ],
    "openorders": {
      "meta": [
        {
          "type": "number",
          "name": "amount"
        },
        {
          "type": "number",
          "name": "block"
        },
        {
          "type": "text",
          "name": "expire_path"
        },
        {
          "type": "number",
          "name": "fee"
        },
        {
          "type": "text",
          "name": "from"
        },
        {
          "type": "number",
          "name": "hbd"
        },
        {
          "type": "number",
          "name": "hive"
        },
        {
          "type": "text",
          "name": "rate"
        },
        {
          "type": "text",
          "name": "txid"
        },
        {
          "type": "text",
          "name": "type"
        }
      ],
      "outputType": "array"
    },
    "openordersrepeat": {
      "meta": [
        {
          "type": "number",
          "name": "amount"
        },
        {
          "type": "number",
          "name": "block"
        },
        {
          "type": "text",
          "name": "expire_path"
        },
        {
          "type": "number",
          "name": "fee"
        },
        {
          "type": "text",
          "name": "from"
        },
        {
          "type": "number",
          "name": "hbd"
        },
        {
          "type": "number",
          "name": "hive"
        },
        {
          "type": "text",
          "name": "rate"
        },
        {
          "type": "text",
          "name": "txid"
        },
        {
          "type": "text",
          "name": "type"
        }
      ],
      "outputType": "array"
    }
  }
});
