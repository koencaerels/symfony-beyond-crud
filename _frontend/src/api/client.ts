import { makeApi, Zodios, type ZodiosOptions } from '@zodios/core'
import { z } from 'zod'

const endpoints = makeApi([
  {
    method: 'get',
    path: '/api',
    alias: 'get_api_start',
    requestFormat: 'json',
    response: z.void()
  },
  {
    method: 'get',
    path: '/api/book/:id',
    alias: 'get_api_get_book_by_id',
    requestFormat: 'json',
    parameters: [
      {
        name: 'id',
        type: 'Path',
        schema: z.string().regex(/\d+/)
      }
    ],
    response: z.void()
  },
  {
    method: 'get',
    path: '/api/books',
    alias: 'get_api_get_books',
    requestFormat: 'json',
    response: z.void()
  },
  {
    method: 'get',
    path: '/api/command/execute',
    alias: 'get_api_command_endpoint',
    requestFormat: 'json',
    response: z.void()
  },
  {
    method: 'post',
    path: '/api/execute/changeBook',
    alias: 'post_command_changeBook',
    requestFormat: 'json',
    response: z.void()
  }
])

export const api = new Zodios(endpoints)

export function createApiClient(baseUrl: string, options?: ZodiosOptions) {
  return new Zodios(baseUrl, endpoints, options)
}
